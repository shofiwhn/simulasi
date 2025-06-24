const simulasiGLB = (p) => {
  let particleGLB;
  let isGLBRunning = false;

  p.setup = function () {
    const canvas = p.createCanvas(500, 200);
    canvas.parent("canvasGLB");

    particleGLB = new VerletParticleGLB(p.createVector(50, p.height / 2), p.createVector(100, 0));

    const toggleButton = document.getElementById("toggleGLBButton");
    toggleButton.addEventListener("click", toggleGLBSimulation);

    p.noLoop();
    p.background(255);
    drawGround();
  };

  p.draw = function () {
    if (isGLBRunning) {
      const dt = p.deltaTime / 1000;
      p.background(255);
      drawGround();

      particleGLB.update(dt);
      particleGLB.display();

      if (particleGLB.position.x > p.width + 10) {
        particleGLB.position.x = -10;
        particleGLB.oldPosition.x = particleGLB.position.x - particleGLB.speed.x * dt;
      }
    }
  };

  function toggleGLBSimulation() {
    const toggleButton = document.getElementById("toggleGLBButton");

    if (!isGLBRunning) {
      isGLBRunning = true;
      toggleButton.textContent = "RESET";
      p.loop();
    } else {
      isGLBRunning = false;
      toggleButton.textContent = "START";
      p.noLoop();
      particleGLB = new VerletParticleGLB(p.createVector(50, p.height / 2), p.createVector(100, 0));
      p.background(255);
      drawGround();
    }
  }

  function drawGround() {
    p.stroke(180);
    p.line(0, p.height / 2 + 10, p.width, p.height / 2 + 10);
  }

  class VerletParticleGLB {
    constructor(position, velocity) {
      this.position = position.copy();
      this.oldPosition = p5.Vector.sub(position, p5.Vector.mult(velocity, 1 / 60));
      this.speed = velocity.copy();
      this.radius = 20;
    }

    update(dt) {
      const temp = this.position.copy();
      this.position = p5.Vector.add(
        p5.Vector.sub(p5.Vector.mult(this.position, 2), this.oldPosition),
        p.createVector(0, 0)
      );
      this.oldPosition = temp;
    }

    display() {
      p.fill(255);
      p.stroke(0);
      p.ellipse(this.position.x, this.position.y, this.radius);
    }
  }
};

new p5(simulasiGLB);
