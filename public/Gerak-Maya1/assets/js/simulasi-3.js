let centerX, centerY;
let radius = 80;
let isRunning = false;
let isClockwise = true;
let isFrictionOn = false;

let theta = 0;
let oldTheta;
let angularAccel = 0;
let angularSpeed = Math.PI * 2; // 1 rotasi per detik
let dt = 0.016;
let damping = 0.99; // Koefisien redaman untuk gesekan

function setup() {
  let canvas = createCanvas(400, 300);
  canvas.parent("canvasMelingkar");

  centerX = width / 2;
  centerY = height / 2;

  resetTheta();

  document.getElementById("toggleCircularButton")
    .addEventListener("click", toggleCircularSimulation);

  document.getElementById("toggleDirectionButton")
    .addEventListener("click", toggleDirection);

  document.getElementById("toggleFrictionButton")
    .addEventListener("click", toggleFriction);

  noLoop();
  background(255);
  drawCirclePath();
  drawBall();
}

function draw() {
  if (isRunning) {
    background(255);
    drawCirclePath();

    // Hitung kecepatan sudut saat ini
    let angularVelocity = theta - oldTheta;

    // Terapkan redaman jika gesekan aktif
    if (isFrictionOn) {
      angularVelocity *= damping;
    }

    // Verlet integrasi sudut
    let tempTheta = theta;
    theta = theta + angularVelocity + angularAccel * dt * dt;
    oldTheta = tempTheta;

    drawBall();
  }
}

function drawBall() {
  let x = centerX + radius * cos(theta);
  let y = centerY + radius * sin(theta);

  fill(255);
  stroke(0);
  ellipse(x, y, 20);
}

function toggleCircularSimulation() {
  const toggleButton = document.getElementById("toggleCircularButton");

  if (!isRunning) {
    isRunning = true;
    toggleButton.textContent = "RESET";
    loop();
  } else {
    isRunning = false;
    toggleButton.textContent = "START";
    noLoop();
    resetTheta();
    background(255);
    drawCirclePath();
    drawBall();
  }
}

function toggleDirection() {
  isClockwise = !isClockwise;
  const dirButton = document.getElementById("toggleDirectionButton");
  dirButton.textContent = isClockwise ? "SEARAH JARUM JAM" : "BERLAWANAN ARAH JARUM JAM";

  angularSpeed = Math.abs(angularSpeed) * (isClockwise ? 1 : -1);

  if (!isRunning) {
    resetTheta();
    background(255);
    drawCirclePath();
    drawBall();
  }
}

function toggleFriction() {
  isFrictionOn = !isFrictionOn;
  const button = document.getElementById("toggleFrictionButton");
  button.textContent = `HAMBATAN: ${isFrictionOn ? "ON" : "OFF"}`;
}

function resetTheta() {
  theta = 0;
  let initialAngularVelocity = angularSpeed * dt;
  oldTheta = theta - initialAngularVelocity;
}

function drawCirclePath() {
  noFill();
  stroke(180);
  ellipse(centerX, centerY, radius * 2);
}
