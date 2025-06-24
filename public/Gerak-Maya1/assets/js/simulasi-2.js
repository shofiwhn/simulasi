let appleSketch = (p) => {
    let isAppleRunning = false;
    let appleImg;
    let x, y;
    let yspeed = 0;
    let gravity = 0.5;
    let deltaTime = 1;

    p.preload = function() {
        appleImg = p.loadImage('apple.png');
    };

    p.setup = function() {
        // Pastikan canvas ditempatkan di div yang sesuai
        p.createCanvas(300, 300).parent("canvasApple");
        x = p.width / 2;
        y = 0;
        p.background(255);

        const toggleButton = document.getElementById('toggleAppleButton');
        toggleButton.addEventListener('click', toggleSketch);
        p.noLoop();
    };

    p.draw = function() {
        if (isAppleRunning) {
            p.background(255);
            yspeed += gravity * deltaTime;
            y += yspeed * deltaTime;
            p.image(appleImg, x - appleImg.width / 2, y - appleImg.height / 2);

            if (y > p.height) {
                y = p.height;
                yspeed = 0;
            }
        }
    };

    function toggleSketch() {
        const toggleAppleButton = document.getElementById('toggleAppleButton');

        if (!isAppleRunning) {
            // Ambil parameter dari input
            const inputY = parseFloat(document.getElementById('initialY').value);
            const inputGravity = parseFloat(document.getElementById('gravity').value);
            const inputDelta = parseFloat(document.getElementById('deltaTime').value);

            y = isNaN(inputY) ? 0 : inputY;
            gravity = isNaN(inputGravity) ? 0.5 : inputGravity;
            deltaTime = isNaN(inputDelta) ? 1 : inputDelta;

            yspeed = 0;
            isAppleRunning = true;
            toggleAppleButton.textContent = 'RESET';
            p.loop();
        } else {
            // Reset simulasi
            isAppleRunning = false;
            y = 0;
            yspeed = 0;
            p.background(255);
            toggleAppleButton.textContent = 'START';
            p.noLoop();
        }
    }
};

new p5(appleSketch, "Simulasi2");

