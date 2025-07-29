<!-- RISE README GRAPHIC -->
<div class="rise-banner">
  <div class="rise-text">
    <h1>🚀 RISE</h1>
    <p class="tagline">Revolution In Student Education</p>
    <p class="desc">Empowering minds. Elevating futures. One student at a time.</p>
  </div>
  <div class="rise-effect"></div>
</div>

<style>
.rise-banner {
  position: relative;
  background: linear-gradient(135deg, #000428, #004e92);
  padding: 60px 20px;
  text-align: center;
  color: #ffffff;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
  font-family: 'Segoe UI', sans-serif;
}

.rise-text h1 {
  font-size: 3.5rem;
  font-weight: 900;
  letter-spacing: 2px;
  animation: riseUp 1s ease-out forwards;
  background: linear-gradient(to right, #fceabb, #f8b500);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.rise-text .tagline {
  font-size: 1.4rem;
  margin: 10px 0;
  font-weight: bold;
  text-transform: uppercase;
  color: #ffeb3b;
}

.rise-text .desc {
  font-size: 1rem;
  color: #ddd;
  max-width: 600px;
  margin: auto;
  opacity: 0.85;
}

.rise-effect::before {
  content: '';
  position: absolute;
  top: -30%;
  left: -30%;
  width: 160%;
  height: 160%;
  background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
  animation: rotateLight 20s linear infinite;
  z-index: 0;
}

@keyframes riseUp {
  from {
    transform: translateY(30px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes rotateLight {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
