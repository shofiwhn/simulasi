let diffusionSketch = (p) => {
  let particles = [];
  let numParticles = 300;
  let diffusionRate = 1;
  let isRunning = false;
  let slider;

  class Particle {
    constructor(x, y) {
      this.pos = p.createVector(x, y);
      this.prevPos = this.pos.copy();
    }

    update() {
      let temp = this.pos.copy();

      // Gaya acak sebagai "percepatan"
      let randomAccel = p.createVector(
        p.random(-1, 1),
        p.random(-1, 1)
      ).mult(diffusionRate);

      // Verlet-style integrasi
      this.pos = p5.Vector.add(
        p5.Vector.sub(p5.Vector.mult(this.pos, 2), this.prevPos),
        randomAccel
      );

      this.prevPos = temp;

      // Batasi ke dalam canvas
      this.pos.x = p.constrain(this.pos.x, 0, p.width);
      this.pos.y = p.constrain(this.pos.y, 0, p.height);
    }

    display() {
      p.noStroke();
      p.fill(100, 150, 255, 100);
      p.ellipse(this.pos.x, this.pos.y, 4);
    }
  }

  function toggleSimulation() {
    const btn = document.getElementById("toggleDiffusionButton");
    if (!isRunning) {
      isRunning = true;
      btn.textContent = "RESET";
      p.loop();
    } else {
      isRunning = false;
      btn.textContent = "START";
      p.noLoop();
      resetParticles();
      p.background(255);
      for (let particle of particles) {
        particle.display();
      }
    }
  }

  function resetParticles() {
    particles = [];
    for (let i = 0; i < numParticles; i++) {
      let x = p.random(20, 50);
      let y = p.random(20, 50);
      particles.push(new Particle(x, y));
    }
  }

  p.setup = () => {
    let canvas = p.createCanvas(500, 300);
    canvas.parent("canvasDifusi");

    // Ambil slider dari HTML
    slider = p.select("#diffusionSlider");

    resetParticles();
    p.background(255);

    document.getElementById("toggleDiffusionButton")
      .addEventListener("click", toggleSimulation);

    p.noLoop();
  };

  p.draw = () => {
    if (isRunning) {
      diffusionRate = parseFloat(slider.value());
      p.background(255, 255, 255, 30); // efek jejak

      for (let particle of particles) {
        particle.update();
        particle.display();
      }
    }
  };
};

new p5(diffusionSketch);
