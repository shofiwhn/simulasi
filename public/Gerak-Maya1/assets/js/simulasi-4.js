const parabolaSim = (p) => {
  let pos;
  let prevPos;
  let acceleration;
  let v0 = 50;
  let angle = 45;
  let dt = 1 / 60.0;
  let running = false;
  const g = 9.8;

  p.setup = () => {
    let canvas = p.createCanvas(500, 300);
    canvas.parent("canvasParabola");

    document.getElementById("toggleParabolaButton")
      .addEventListener("click", toggleSimulation);

    resetSimulation();
    p.noLoop();
    p.frameRate(60);
  };

  p.draw = () => {
    p.background(255);
    p.stroke(0);
    p.line(0, p.height - 20, p.width, p.height - 20); // tanah

    if (running) {
      let temp = pos.copy();

      // Verlet Integration
      let nextPos = pos.copy()
        .mult(2)
        .sub(prevPos)
        .add(acceleration.copy().mult(dt * dt));

      prevPos = temp;
      pos = nextPos;

      if (p.height - 20 - pos.y > p.height) {
        running = false;
        document.getElementById("toggleParabolaButton").textContent = "START";
        p.noLoop();
      }
    }

    p.fill(255);
    p.stroke(0);
    p.ellipse(pos.x, p.height - 20 - pos.y, 20); // bola
  };

  function toggleSimulation() {
    const toggleBtn = document.getElementById("toggleParabolaButton");

    if (!running) {
      v0 = parseFloat(document.getElementById("v0").value);
      angle = parseFloat(document.getElementById("angle").value);

      let x0 = 0;
      let y0 = 0;
      pos = p.createVector(x0, y0);

      let vx = v0 * p.cos(p.radians(angle));
      let vy = v0 * p.sin(p.radians(angle));
      prevPos = p.createVector(x0 - vx * dt, y0 - vy * dt);

      acceleration = p.createVector(0, -g);

      running = true;
      toggleBtn.textContent = "RESET";
      p.loop();
    } else {
      resetSimulation();
      toggleBtn.textContent = "START";
      p.noLoop();
      p.redraw();
    }
  }

  function resetSimulation() {
    pos = p.createVector(0, 0);
    prevPos = pos.copy();
    acceleration = p.createVector(0, -g);
    running = false;
  }
};

new p5(parabolaSim, 'canvasParabola');
