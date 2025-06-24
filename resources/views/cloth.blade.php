<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('Gerak-Maya1/assets/icon/gm.png') }}" type="image/x-icon" />
    <title>Gerak Maya | Simulasi Kain</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            background-color: #0c0c0c;
            font-family: Arial, sans-serif;
            color: #DDC6B6;
        }

        canvas {
            display: block;
            width: 100vw;
            height: 80vh;
            background-color: black;
        }

        #options, #actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1em;
            padding: 1em;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input[type=range] {
            width: 100px;
        }

        button {
            padding: 0.5em 1em;
            background-color: transparent;
            border: 2px solid #DDC6B6;
            color: #DDC6B6;
            cursor: pointer;
        }

        button:hover {
            background-color: #DDC6B6;
            color: black;
        }

        @media (max-width: 768px) {
            canvas {
                height: 60vh;
            }
        }
    </style>
</head>
<body>
    <div id="options">
        <div>
            <label for="spacing">Jarak</label>
            <input type="range" id="spacing" min="1" max="12" value="7" oninput="resetSpacing(this,this.value)" />
        </div>
        <div>
            <label for="cols">Kolom</label>
            <input type="range" id="cols" min="20" max="76" value="65" oninput="resetCols(this,this.value)" />
        </div>
        <div>
            <label for="rows">Baris</label>
            <input type="range" id="rows" min="20" max="60" value="40" oninput="resetRows(this,this.value)" />
        </div>
        <button id="changeCloth">Ganti</button>
    </div>

    <div id="actions">
        <div>
            <input type="radio" name="Action" id="tear" checked />
            <label for="tear">Merobek</label>
        </div>
        <div>
            <input type="radio" name="Action" id="drag" />
            <label for="drag">Menyeret</label>
        </div>
        <div>
            <input type="radio" name="Action" id="move" />
            <label for="move">Memindahkan Pin</label>
        </div>
        <div>
            <input type="radio" name="Action" id="add" />
            <label for="add">Tambah Pin</label>
        </div>
        <div>
            <input type="radio" name="Action" id="remove" />
            <label for="remove">Hapus Pin</label>
        </div>
    </div>

    <canvas id="canvas"></canvas>

    <script>
        let canvas = document.getElementById("canvas"),
            ctx = canvas.getContext("2d"),
            width, height;

        function resizeCanvas() {
            canvas.width = canvas.clientWidth;
            canvas.height = canvas.clientHeight;
            width = canvas.width;
            height = canvas.height;
        }

        window.addEventListener("resize", resizeCanvas);
        resizeCanvas();

        let RBdrag = document.getElementById("drag"),
            RBtear = document.getElementById("tear"),
            RBmove = document.getElementById("move"),
            RBadd = document.getElementById("add"),
            RBremove = document.getElementById("remove");

        let space = parseFloat(document.getElementById("spacing").value),
            rows = parseFloat(document.getElementById("rows").value),
            cols = parseFloat(document.getElementById("cols").value);

        let btn = document.getElementById("changeCloth");

        let points = [],
            sticks = [],
            ball_radius = 10,
            bounce = 0.9,
            friction = 0.999,
            increment = 3;

        let gravity;
        let topPinned = false;

        let mouse = { x: width / 2, y: height / 2 };

        generatePoints(rows, cols, space);
        generateSticks(rows, cols, space);
        pinPoints();

        function update() {
            for (let i = 0; i < 2; i++) {
                updatePoints();
                updateSticks();
            }
            ctx.clearRect(0, 0, width, height);
            renderSticks();
            renderPoints();
            requestAnimationFrame(update);
        }

        update();

        function distance(p1, p2) {
            let dx = p1.x - p2.x,
                dy = p1.y - p2.y;
            return Math.sqrt(dx * dx + dy * dy);
        }

        function resetSpacing(ele, value) {
            ctx.clearRect(0, 0, width, height);
            points = [];
            sticks = [];
            space = parseFloat(value);
            generatePoints(rows, cols, space);
            generateSticks(rows, cols, space);
            pinPoints();
        }

        function resetCols(ele, value) {
            ctx.clearRect(0, 0, width, height);
            points = [];
            sticks = [];
            cols = parseFloat(value);
            generatePoints(rows, cols, space);
            generateSticks(rows, cols, space);
            pinPoints();
        }

        function resetRows(ele, value) {
            ctx.clearRect(0, 0, width, height);
            points = [];
            sticks = [];
            rows = parseFloat(value);
            generatePoints(rows, cols, space);
            generateSticks(rows, cols, space);
            pinPoints();
        }

        function updatePoints() {
            for (let i = 0; i < points.length; i++) {
                let p = points[i];
                if (!p.pinned) {
                    let vx = (p.x - p.oldx) * friction,
                        vy = (p.y - p.oldy) * friction;
                    p.oldx = p.x;
                    p.oldy = p.y;
                    p.x += vx;
                    p.y += vy;
                    p.y += gravity;
                    let rightEdge = width - ball_radius,
                        leftEdge = ball_radius,
                        topEdge = ball_radius,
                        bottomEdge = height - ball_radius;
                    if (p.x > rightEdge) {
                        p.x = rightEdge;
                        p.oldx = p.x + vx * bounce;
                    } else if (p.x < leftEdge) {
                        p.x = leftEdge;
                        p.oldx = p.x + vx * bounce;
                    }
                    if (p.y > bottomEdge) {
                        p.y = bottomEdge;
                        p.oldy = p.y + vy * bounce;
                    } else if (p.y < topEdge) {
                        p.y = topEdge;
                        p.oldy = p.y + vy * bounce;
                    }
                }
            }
        }

        function updateSticks() {
            for (let i = 0; i < sticks.length; i++) {
                let s = sticks[i];
                let dx = s.p2.x - s.p1.x,
                    dy = s.p2.y - s.p1.y,
                    dist = Math.sqrt(dx * dx + dy * dy),
                    diff = dist - s.length,
                    percent = diff / dist / 2,
                    offsetX = dx * percent,
                    offsetY = dy * percent;
                if (!s.p1.pinned) {
                    s.p1.x += offsetX;
                    s.p1.y += offsetY;
                }
                if (!s.p2.pinned) {
                    s.p2.x -= offsetX;
                    s.p2.y -= offsetY;
                }
            }
        }

        function renderPoints() {
            for (let i = 0; i < points.length; i++) {
                let p = points[i];
                if (p.pinned) {
                    ctx.beginPath();
                    ctx.fillStyle = p.color;
                    ctx.arc(p.x, p.y, ball_radius, 0, Math.PI * 2);
                    ctx.fill();
                }
            }
        }

        function renderSticks() {
            ctx.beginPath();
            for (let i = 0; i < sticks.length; i++) {
                let s = sticks[i];
                ctx.moveTo(s.p1.x, s.p1.y);
                ctx.lineTo(s.p2.x, s.p2.y);
            }
            ctx.strokeStyle = "#DDC6B6";
            ctx.stroke();
        }

        function generatePoints(rows, cols, value) {
            let initial_x = (width - cols * value) / 2,
                initial_y = 20;
            for (let i = 0; i < rows; i++) {
                initial_y += value;
                for (let j = 0; j < cols; j++) {
                    initial_x += value;
                    let point = {
                        x: initial_x,
                        y: initial_y,
                        oldx: initial_x - increment,
                        oldy: initial_y,
                        color: "red",
                    };
                    points.push(point);
                }
                initial_x = (width - cols * value) / 2;
            }
        }

        function generateSticks(rows, cols, value) {
            let initial_index = 0;
            for (let i = 0; i < rows; i++) {
                initial_index = cols * i;
                for (let j = 0; j < cols - 1; j++) {
                    sticks.push({
                        p1: points[initial_index + j],
                        p2: points[initial_index + j + 1],
                        length: distance(points[initial_index + j], points[initial_index + j + 1]),
                    });
                }
            }
            for (let i = 0; i < rows - 1; i++) {
                initial_index = i * cols;
                for (let j = 0; j < cols; j++) {
                    sticks.push({
                        p1: points[initial_index + j],
                        p2: points[initial_index + cols + j],
                        length: distance(points[initial_index + j], points[initial_index + cols + j]),
                    });
                }
            }
        }

        function pinPoints() {
            if (topPinned) {
                gravity = 0.06;
                ball_radius = 3;
                for (let i = 0; i < cols; i++) {
                    points[i].pinned = true;
                }
            } else {
                gravity = 0.019;
                ball_radius = 10;
                points[0].pinned = true;
                points[(rows - 1) * cols].pinned = true;
                points[cols - 1].pinned = true;
                points[rows * cols - 1].pinned = true;
            }
        }

        let tearing = false,
            dragging = false,
            moving = false,
            add = false,
            remove = false;
        let dragHandle;
        let offset = { x: 0, y: 0 };

        // Fungsi umum untuk dapatkan posisi pointer (mouse/touch)
        function getPointerPos(event) {
            let rect = canvas.getBoundingClientRect();
            let x, y;
            if (event.touches) {
                x = ((event.touches[0].clientX - rect.left) / (rect.right - rect.left)) * canvas.width;
                y = ((event.touches[0].clientY - rect.top) / (rect.bottom - rect.top)) * canvas.height;
            } else {
                x = ((event.clientX - rect.left) / (rect.right - rect.left)) * canvas.width;
                y = ((event.clientY - rect.top) / (rect.bottom - rect.top)) * canvas.height;
            }
            return { x, y };
        }

        // Handler gabungan untuk mousemove dan touchmove
        function handlePointerMove(event) {
            event.preventDefault();
            let pos = getPointerPos(event);
            mouse.x = pos.x;
            mouse.y = pos.y;

            if (tearing) {
                sticks = sticks.filter(
                    s =>
                        !(
                            mouse.x >= s.p1.x - 5 &&
                            mouse.x <= s.p1.x + 5 &&
                            mouse.y >= s.p1.y &&
                            mouse.y <= s.p2.y
                        )
                );
            }
            if (dragging) {
                points.forEach(p => {
                    if (
                        !p.pinned &&
                        mouse.x >= p.x - 8 &&
                        mouse.x <= p.x + 8 &&
                        mouse.y >= p.y - 8 &&
                        mouse.y <= p.y + 8
                    ) {
                        p.x = mouse.x;
                        p.y = mouse.y;
                    }
                });
            }
            if (moving) {
                points.forEach(p => {
                    if (
                        p.pinned &&
                        mouse.x >= p.x - 5 &&
                        mouse.x <= p.x + 5 &&
                        mouse.y >= p.y - 5 &&
                        mouse.y <= p.y + 5
                    ) {
                        p.color = "#90ee90";
                        dragHandle = p;
                        offset.x = (event.touches ? event.touches[0].clientX : event.clientX) - p.x;
                        offset.y = (event.touches ? event.touches[0].clientY : event.clientY) - p.y;
                        document.body.addEventListener("mousemove", onMouseMove);
                        document.body.addEventListener("mouseup", onMouseUp);
                        document.body.addEventListener("touchmove", onTouchMove, { passive: false });
                        document.body.addEventListener("touchend", onTouchEnd);
                    }
                });
            }
            if (add) {
                points.forEach(p => {
                    if (
                        !p.pinned &&
                        mouse.x >= p.x - 3 &&
                        mouse.x <= p.x + 3 &&
                        mouse.y >= p.y - 3 &&
                        mouse.y <= p.y + 3
                    ) {
                        p.pinned = true;
                    }
                });
            }
            if (remove) {
                points.forEach(p => {
                    if (
                        p.pinned &&
                        mouse.x >= p.x - 5 &&
                        mouse.x <= p.x + 5 &&
                        mouse.y >= p.y - 5 &&
                        mouse.y <= p.y + 5
                    ) {
                        p.pinned = false;
                    }
                });
            }
        }

        function onMouseMove(e) {
            if (!dragHandle) return;
            dragHandle.x = e.clientX - offset.x;
            dragHandle.y = e.clientY - offset.y;
        }

        function onMouseUp() {
            if (dragHandle) dragHandle.color = "red";
            dragHandle = null;
            document.body.removeEventListener("mousemove", onMouseMove);
            document.body.removeEventListener("mouseup", onMouseUp);
        }

        function onTouchMove(e) {
            e.preventDefault();
            if (!dragHandle) return;
            dragHandle.x = e.touches[0].clientX - offset.x;
            dragHandle.y = e.touches[0].clientY - offset.y;
        }

        function onTouchEnd() {
            if (dragHandle) dragHandle.color = "red";
            dragHandle = null;
            document.body.removeEventListener("touchmove", onTouchMove);
            document.body.removeEventListener("touchend", onTouchEnd);
        }

        // Pasang event listener gabungan
        document.body.addEventListener("mousemove", handlePointerMove);
        document.body.addEventListener("touchmove", handlePointerMove, { passive: false });

        function handlePointerDown(event) {
            tearing = RBtear.checked;
            dragging = RBdrag.checked;
            moving = RBmove.checked;
            add = RBadd.checked;
            remove = RBremove.checked;
        }

        document.body.addEventListener("mousedown", handlePointerDown);
        document.body.addEventListener("touchstart", handlePointerDown);

        btn.onclick = function () {
    topPinned = !topPinned;
    points = [];
    sticks = [];
    generatePoints(rows, cols, space);
    generateSticks(rows, cols, space);
    pinPoints();
};
    </script>
</body>
</html>
