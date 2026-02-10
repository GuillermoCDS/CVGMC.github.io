<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Iron Man | Experiencia Jarvis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@300;400;600;700&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
      :root {
        --jarvis-cyan: #63f6ff;
        --jarvis-blue: #1b3b6f;
        --jarvis-red: #ff5b3a;
        --jarvis-gold: #f5b544;
        --jarvis-dark: #05080f;
        --jarvis-panel: rgba(9, 20, 36, 0.85);
        --jarvis-border: rgba(99, 246, 255, 0.2);
      }

      body {
        font-family: 'Rajdhani', sans-serif;
        background: radial-gradient(circle at top, #0d1b2a 0%, #05080f 60%);
        color: #e9f5ff;
        min-height: 100vh;
        overflow-x: hidden;
      }

      body.light-mode {
        background: #f7f7fb;
        color: #10131a;
      }

      body.light-mode .panel,
      body.light-mode .section-card {
        background: rgba(255, 255, 255, 0.92);
        color: #10131a;
      }

      body.light-mode .arc-core {
        border-color: #ff5b3a;
        box-shadow: 0 0 25px rgba(255, 91, 58, 0.4);
      }

      body.light-mode .starfield {
        opacity: 0.25;
      }

      .starfield,
      .starfield::before,
      .starfield::after {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        content: '';
        display: block;
        background: transparent;
        z-index: 0;
      }

      .starfield::before {
        background-image: radial-gradient(2px 2px at 20% 30%, rgba(255, 255, 255, 0.6) 40%, transparent 40%),
          radial-gradient(1px 1px at 80% 10%, rgba(99, 246, 255, 0.7) 50%, transparent 50%),
          radial-gradient(1.5px 1.5px at 60% 70%, rgba(255, 255, 255, 0.5) 50%, transparent 50%),
          radial-gradient(2px 2px at 40% 90%, rgba(245, 181, 68, 0.6) 50%, transparent 50%);
        animation: starfall 12s linear infinite;
        opacity: 0.5;
      }

      .starfield::after {
        background-image: radial-gradient(1px 1px at 10% 20%, rgba(255, 255, 255, 0.4) 50%, transparent 50%),
          radial-gradient(1px 1px at 30% 80%, rgba(255, 91, 58, 0.5) 50%, transparent 50%),
          radial-gradient(2px 2px at 75% 60%, rgba(99, 246, 255, 0.7) 50%, transparent 50%);
        animation: starfall 20s linear infinite;
        opacity: 0.4;
      }

      @keyframes starfall {
        0% {
          transform: translateY(-100px);
        }
        100% {
          transform: translateY(100px);
        }
      }

      header {
        position: sticky;
        top: 0;
        z-index: 10;
        backdrop-filter: blur(6px);
      }

      .panel {
        background: var(--jarvis-panel);
        border: 1px solid var(--jarvis-border);
        box-shadow: 0 0 30px rgba(99, 246, 255, 0.1);
      }

      .hero {
        min-height: 90vh;
        display: flex;
        align-items: center;
        position: relative;
        z-index: 1;
      }

      .hero .badge {
        letter-spacing: 0.25rem;
        text-transform: uppercase;
      }

      .section-card {
        background: rgba(9, 20, 36, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 24px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
      }

      .section-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 24px;
        border: 1px solid rgba(99, 246, 255, 0.2);
        opacity: 0.4;
        pointer-events: none;
      }

      .section-title {
        font-family: 'Orbitron', sans-serif;
        font-size: clamp(1.5rem, 2vw, 2.4rem);
        color: var(--jarvis-cyan);
        text-transform: uppercase;
      }

      .arc-reactor {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        position: relative;
        border: 3px solid rgba(99, 246, 255, 0.5);
        box-shadow: 0 0 30px rgba(99, 246, 255, 0.4);
        margin: 0 auto;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .arc-reactor:hover {
        transform: scale(1.03);
      }

      .arc-core {
        position: absolute;
        inset: 20px;
        border-radius: 50%;
        border: 2px dashed rgba(99, 246, 255, 0.8);
        box-shadow: inset 0 0 25px rgba(99, 246, 255, 0.5);
        animation: pulse 3s ease-in-out infinite;
      }

      .arc-core::after {
        content: '';
        position: absolute;
        inset: 18px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(99, 246, 255, 0.7) 0%, rgba(9, 20, 36, 0.2) 60%, transparent 100%);
      }

      @keyframes pulse {
        0%,
        100% {
          transform: scale(0.98);
        }
        50% {
          transform: scale(1.04);
        }
      }

      .reactor-menu {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        list-style: none;
        padding: 0;
        margin: 0;
        width: 260px;
        height: 260px;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .reactor-menu.show {
        opacity: 1;
        pointer-events: all;
      }

      .reactor-menu li {
        position: absolute;
        width: 120px;
        text-align: center;
      }

      .reactor-menu button {
        width: 100%;
        border-radius: 999px;
      }

      .reactor-menu li:nth-child(1) {
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
      }

      .reactor-menu li:nth-child(2) {
        top: 40px;
        right: -10px;
      }

      .reactor-menu li:nth-child(3) {
        top: 140px;
        right: -10px;
      }

      .reactor-menu li:nth-child(4) {
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
      }

      .reactor-menu li:nth-child(5) {
        top: 140px;
        left: -10px;
      }

      .reactor-menu li:nth-child(6) {
        top: 40px;
        left: -10px;
      }

      .reactor-menu li:nth-child(7) {
        top: 55%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .reactor-menu li:nth-child(8) {
        bottom: 40px;
        left: -10px;
      }

      .reactor-menu li:nth-child(9) {
        bottom: 40px;
        right: -10px;
      }

      .reactor-menu li:nth-child(10) {
        top: -10px;
        left: 10px;
      }

      .reactor-menu li:nth-child(11) {
        top: -10px;
        right: 10px;
      }

      .mode-toggle {
        background: transparent;
        border: 1px solid rgba(99, 246, 255, 0.4);
        color: inherit;
        border-radius: 999px;
        padding: 0.35rem 1rem;
      }

      .language-toggle select {
        background: transparent;
        border: 1px solid rgba(99, 246, 255, 0.4);
        color: inherit;
      }

      .section-view {
        display: none;
      }

      .section-view.active {
        display: block;
        animation: armor-shift 0.6s ease;
      }

      @keyframes armor-shift {
        0% {
          opacity: 0;
          transform: translateY(30px) scale(0.98);
          filter: brightness(0.8);
        }
        100% {
          opacity: 1;
          transform: translateY(0) scale(1);
          filter: brightness(1);
        }
      }

      .audio-controls {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9;
        background: rgba(9, 20, 36, 0.9);
        border: 1px solid rgba(99, 246, 255, 0.4);
        border-radius: 999px;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        backdrop-filter: blur(8px);
      }

      .audio-controls button {
        border-radius: 999px;
      }

      .login-overlay {
        position: fixed;
        inset: 0;
        background: rgba(5, 8, 15, 0.96);
        z-index: 20;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
      }

      .login-card {
        max-width: 680px;
        width: 100%;
      }

      .login-card h2 {
        font-family: 'Orbitron', sans-serif;
      }

      .status-pill {
        font-size: 0.85rem;
        padding: 0.35rem 0.75rem;
        border-radius: 999px;
        background: rgba(99, 246, 255, 0.1);
        border: 1px solid rgba(99, 246, 255, 0.3);
      }

      footer {
        padding: 4rem 0 6rem;
      }

      .timeline {
        border-left: 2px solid rgba(99, 246, 255, 0.4);
        padding-left: 1.5rem;
      }

      .timeline-item {
        margin-bottom: 1.5rem;
      }

      .timeline-item span {
        font-size: 0.9rem;
        color: rgba(233, 245, 255, 0.7);
      }

      @media (max-width: 768px) {
        .arc-reactor {
          width: 110px;
          height: 110px;
        }

        .reactor-menu {
          width: 220px;
          height: 220px;
        }

        .reactor-menu li {
          width: 100px;
        }
      }
    </style>
  </head>
  <body>
    <div class="starfield"></div>

    <div class="login-overlay" id="loginOverlay">
      <div class="login-card panel p-4">
        <div class="row g-4">
          <div class="col-lg-6">
            <h2 class="mb-3">Acceso Jarvis</h2>
            <p class="text-light-emphasis">Ingresa como piloto autorizado para desbloquear la experiencia previa del sitio.</p>
            <form id="loginForm">
              <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" id="loginUser" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="loginPass" required>
              </div>
              <button class="btn btn-primary w-100" type="submit">Activar sistema</button>
              <div class="mt-3" id="loginMessage"></div>
            </form>
          </div>
          <div class="col-lg-6">
            <h2 class="mb-3">Crear nuevo usuario</h2>
            <p class="text-light-emphasis">Administra pilotos y permisos desde tu reactor.</p>
            <form id="registerForm">
              <div class="mb-3">
                <label class="form-label">Nuevo usuario</label>
                <input type="text" class="form-control" id="registerUser" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="registerPass" required>
              </div>
              <button class="btn btn-outline-info w-100" type="submit">Registrar piloto</button>
              <div class="mt-3" id="registerMessage"></div>
            </form>
          </div>
        </div>
        <div class="mt-4 d-flex align-items-center gap-2">
          <span class="status-pill">Modo previo activo</span>
          <small class="text-light-emphasis">Los usuarios se guardan en el navegador para esta demostración.</small>
        </div>
      </div>
    </div>

    <header class="py-3">
      <div class="container d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
          <h1 class="h4 mb-0" style="font-family: 'Orbitron', sans-serif;">JARVIS | CV ARMOR EXPERIENCE</h1>
          <small class="text-light-emphasis">Interface inspirada en Iron Man • Bootstrap + Kumbia PHP</small>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button class="mode-toggle" id="modeToggle">Modo nocturno</button>
          <div class="language-toggle">
            <select class="form-select form-select-sm" id="languageSelect">
              <option value="es">Español</option>
              <option value="en">English</option>
            </select>
          </div>
        </div>
      </div>
    </header>

    <main class="container position-relative" style="z-index: 2;">
      <section class="hero">
        <div class="row align-items-center g-4">
          <div class="col-lg-7">
            <span class="badge bg-info text-dark mb-3">INICIANDO ARMADURA</span>
            <h2 class="display-4 fw-bold">Bienvenido al ingreso del reactor Ark</h2>
            <p class="lead text-light-emphasis">La experiencia comienza como si te colocaran una armadura Iron Man: hologramas, energía azul y una voz JARVIS guiándote para conocer tu historia profesional.</p>
            <div class="d-flex flex-wrap gap-3">
              <button class="btn btn-outline-info" data-section="about">Iniciar protocolo</button>
              <button class="btn btn-outline-warning" data-section="experience">Ver armaduras</button>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="section-card">
              <h3 class="section-title">Secuencia de entrada</h3>
              <ul class="list-unstyled mt-3">
                <li>🔹 Apertura del casco • sensores calibrados.</li>
                <li>🔹 Reactor Ark sincronizado con tus metas.</li>
                <li>🔹 Interface Jarvis lista para narrar tu historia.</li>
                <li>🔹 Escenarios inmersivos con cada sección.</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="section-card">
        <div class="text-center">
          <h3 class="section-title">Núcleo de navegación</h3>
          <p class="text-light-emphasis">Presiona el reactor Ark para desplegar el menú radial y viajar por cada sección.</p>
          <div class="position-relative d-inline-block mt-4">
            <div class="arc-reactor" id="arcReactor">
              <div class="arc-core"></div>
            </div>
            <ul class="reactor-menu" id="reactorMenu">
              <li><button class="btn btn-sm btn-outline-info" data-section="about">Sobre mí</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="certifications">Certificaciones</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="studies">Estudios</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="experience">Experiencia</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="soft-skills">H. blandas</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="hard-skills">H. técnicas</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="profiles">Perfiles</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="education">Motivación</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="contact">Contacto</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="social">Redes</button></li>
              <li><button class="btn btn-sm btn-outline-info" data-section="future">Futuro</button></li>
            </ul>
          </div>
        </div>
      </section>

      <section class="section-view active" id="about">
        <div class="section-card">
          <h3 class="section-title">Sobre mí</h3>
          <p>Profesional apasionado por la tecnología, la innovación y la creación de experiencias digitales inmersivas. Me especializo en combinar visión estratégica, desarrollo web y liderazgo para proyectos que transforman negocios y personas.</p>
          <div class="row g-4 mt-3">
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Identidad</h5>
                <p>Arquitecto de soluciones digitales, storyteller y estratega de producto con foco en impacto humano.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Propósito</h5>
                <p>Inspirar a equipos y marcas a innovar con propósito, ética y creatividad.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Superpoder</h5>
                <p>Conectar datos, emociones y diseño para crear soluciones memorables.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="certifications">
        <div class="section-card">
          <h3 class="section-title">Certificaciones</h3>
          <div class="row g-4 mt-3">
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Arquitectura Cloud</h5>
                <p>Especialización en diseño de infraestructuras seguras y escalables.</p>
                <span class="badge bg-info text-dark">2024</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>UI/UX Futurista</h5>
                <p>Diseño centrado en el usuario con énfasis en accesibilidad y storytelling.</p>
                <span class="badge bg-info text-dark">2023</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Gestión Ágil</h5>
                <p>Scrum, Kanban y liderazgo adaptativo para equipos multidisciplinarios.</p>
                <span class="badge bg-info text-dark">2022</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Cybersecurity</h5>
                <p>Buenas prácticas para proteger plataformas y datos sensibles.</p>
                <span class="badge bg-info text-dark">2021</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="studies">
        <div class="section-card">
          <h3 class="section-title">Estudios</h3>
          <div class="timeline mt-4">
            <div class="timeline-item">
              <h5>Ingeniería de Sistemas</h5>
              <span>Universidad Central • 2015 - 2020</span>
              <p>Formación integral en desarrollo, bases de datos, arquitectura y análisis de procesos.</p>
            </div>
            <div class="timeline-item">
              <h5>Especialización en Transformación Digital</h5>
              <span>Instituto TechNova • 2021</span>
              <p>Metodologías para impulsar innovación empresarial, cultura digital y gestión del cambio.</p>
            </div>
            <div class="timeline-item">
              <h5>Diplomado en Analítica y Datos</h5>
              <span>DataLab • 2022</span>
              <p>Visualización, modelado de datos y toma de decisiones basadas en evidencia.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="experience">
        <div class="section-card">
          <h3 class="section-title">Experiencia Profesional</h3>
          <div class="row g-4 mt-3">
            <div class="col-lg-6">
              <div class="panel p-3">
                <h5>Head of Digital Experience</h5>
                <p>Diseño e implementación de plataformas multicanal con impacto global.</p>
                <ul>
                  <li>+30 proyectos lanzados en menos de 3 años.</li>
                  <li>Optimización del journey digital con métricas de conversión.</li>
                  <li>Implementación de IA para soporte y automatización.</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel p-3">
                <h5>Product Owner</h5>
                <p>Gestión de roadmap, experiencia de usuario y coordinación con stakeholders.</p>
                <ul>
                  <li>Rediseño de portales con aumento de satisfacción del 40%.</li>
                  <li>Planificación agile y liderazgo de squads.</li>
                  <li>Integración de herramientas analíticas en tiempo real.</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel p-3">
                <h5>Consultor de Innovación</h5>
                <p>Asesoría a empresas en procesos de cambio tecnológico.</p>
                <ul>
                  <li>Workshops para mentalidad digital.</li>
                  <li>Diseño de prototipos y MVPs.</li>
                  <li>Gestión de talento y cultura.</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="panel p-3">
                <h5>Desarrollador Full Stack</h5>
                <p>Desarrollo de plataformas web con enfoque en performance.</p>
                <ul>
                  <li>Integración de APIs y microservicios.</li>
                  <li>Automatización de procesos de negocio.</li>
                  <li>Experiencias front-end con animaciones avanzadas.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="soft-skills">
        <div class="section-card">
          <h3 class="section-title">Habilidades Blandas</h3>
          <div class="row g-4 mt-3">
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Liderazgo Inspirador</h5>
                <p>Capacidad de motivar equipos, impulsar confianza y alinear visión.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Comunicación Estratégica</h5>
                <p>Traducción de ideas complejas en narrativas claras y potentes.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Adaptabilidad</h5>
                <p>Respuesta rápida frente a cambios y nuevas tecnologías.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="hard-skills">
        <div class="section-card">
          <h3 class="section-title">Habilidades Profesionales</h3>
          <div class="row g-4 mt-3">
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Stack Técnico</h5>
                <p>PHP (Kumbia), JavaScript, APIs, Bootstrap, SQL, DevOps.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Herramientas</h5>
                <p>Figma, Jira, GitHub, Power BI, Docker, Notion.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Metodologías</h5>
                <p>Scrum, Design Thinking, OKRs, Growth.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Data & IA</h5>
                <p>Modelos predictivos, dashboards ejecutivos, automatizaciones inteligentes.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="profiles">
        <div class="section-card">
          <h3 class="section-title">Perfiles Profesionales</h3>
          <div class="row g-4 mt-3">
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>LinkedIn</h5>
                <p>Red de networking, artículos y actualizaciones de proyectos.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>GitHub</h5>
                <p>Repositorio de proyectos, contribuciones open-source y experimentos.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Behance / Dribbble</h5>
                <p>Portafolio visual de diseños UI/UX y prototipos interactivos.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Medium</h5>
                <p>Publicaciones sobre innovación, liderazgo y tendencias tecnológicas.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="education">
        <div class="section-card">
          <h3 class="section-title">¿Por qué estudié esto?</h3>
          <p>Elegí la tecnología porque siempre imaginé que podía construir interfaces como las que Tony Stark tenía en sus películas. Comprendí que la programación es el lenguaje para hacer realidad nuevas experiencias y ayudar a otros a transformar sus ideas en soluciones reales.</p>
          <div class="row g-4 mt-3">
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Motivación</h5>
                <p>La curiosidad por la ciencia ficción, la ingeniería y el impacto humano.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Meta</h5>
                <p>Crear experiencias digitales que inspiren y tengan propósito.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="social">
        <div class="section-card">
          <h3 class="section-title">Redes Sociales</h3>
          <div class="row g-4 mt-3">
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Instagram</h5>
                <p>Stories creativas, behind the scenes y procesos de diseño.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Twitter / X</h5>
                <p>Ideas rápidas, tendencias tech y reflexiones diarias.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>YouTube</h5>
                <p>Videos educativos y demostraciones de proyectos.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="contact">
        <div class="section-card">
          <h3 class="section-title">Medios de contacto</h3>
          <div class="row g-4 mt-3">
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Email</h5>
                <p>contacto@tudominio.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel p-3">
                <h5>Teléfono</h5>
                <p>+00 000 000 000</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel p-3">
                <h5>Agenda una reunión</h5>
                <p>Disponible para nuevas oportunidades y colaboraciones creativas.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-view" id="future">
        <div class="section-card">
          <h3 class="section-title">Próximas Armaduras</h3>
          <p>La aventura continúa con planes de especialización en IA aplicada, expansión internacional y liderazgo de laboratorios de innovación.</p>
          <div class="row g-4 mt-3">
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Armor MK Future</h5>
                <p>Investigación en interfaces holográficas y realidad mixta.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Proyecto Arc</h5>
                <p>Plataforma educativa para mentorías y talento emergente.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel p-3">
                <h5>Visión Global</h5>
                <p>Alianzas con startups y centros de investigación.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="text-center">
      <div class="container">
        <p class="text-light-emphasis">Diseñado con Bootstrap y la filosofía de Kumbia PHP para modularidad, claridad y energía.</p>
        <p class="mb-0">&copy; 2024 Experiencia JARVIS • Personaliza este contenido con tu historia real.</p>
      </div>
    </footer>

    <div class="audio-controls">
      <button class="btn btn-sm btn-outline-info" id="audioToggle">Play</button>
      <input type="range" id="audioVolume" min="0" max="1" step="0.05" value="0.5">
      <small class="text-light-emphasis">Música Jarvis</small>
    </div>

    <audio id="backgroundAudio" preload="auto" loop>
      <source src="https://cdn.pixabay.com/download/audio/2022/03/15/audio_0d9a49f702.mp3?filename=cyber-ambient-110227.mp3" type="audio/mpeg">
    </audio>

    <script>
      const sections = document.querySelectorAll('.section-view');
      const buttons = document.querySelectorAll('[data-section]');
      const arcReactor = document.getElementById('arcReactor');
      const reactorMenu = document.getElementById('reactorMenu');
      const modeToggle = document.getElementById('modeToggle');
      const languageSelect = document.getElementById('languageSelect');
      const loginOverlay = document.getElementById('loginOverlay');
      const loginForm = document.getElementById('loginForm');
      const registerForm = document.getElementById('registerForm');
      const loginMessage = document.getElementById('loginMessage');
      const registerMessage = document.getElementById('registerMessage');
      const audioToggle = document.getElementById('audioToggle');
      const audioVolume = document.getElementById('audioVolume');
      const backgroundAudio = document.getElementById('backgroundAudio');

      const defaultUsers = [{ username: 'jarvis', password: 'reactor' }];

      const loadUsers = () => JSON.parse(localStorage.getItem('jarvisUsers')) || defaultUsers;
      const saveUsers = (users) => localStorage.setItem('jarvisUsers', JSON.stringify(users));

      const showSection = (id) => {
        sections.forEach((section) => {
          section.classList.toggle('active', section.id === id);
        });
      };

      buttons.forEach((button) => {
        button.addEventListener('click', () => {
          const target = button.getAttribute('data-section');
          showSection(target);
          reactorMenu.classList.remove('show');
        });
      });

      arcReactor.addEventListener('click', () => {
        reactorMenu.classList.toggle('show');
      });

      modeToggle.addEventListener('click', () => {
        document.body.classList.toggle('light-mode');
        const isLight = document.body.classList.contains('light-mode');
        modeToggle.textContent = isLight ? 'Modo nocturno' : 'Modo diurno';
      });

      languageSelect.addEventListener('change', (event) => {
        const language = event.target.value;
        if (language === 'en') {
          alert('English mode activated. You can replace content with translations.');
        } else {
          alert('Modo español activado.');
        }
      });

      loginForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const users = loadUsers();
        const username = document.getElementById('loginUser').value.trim();
        const password = document.getElementById('loginPass').value.trim();
        const valid = users.some((user) => user.username === username && user.password === password);

        if (valid) {
          loginOverlay.style.display = 'none';
          loginMessage.innerHTML = '<span class="text-success">Acceso concedido. Bienvenido.</span>';
        } else {
          loginMessage.innerHTML = '<span class="text-danger">Credenciales incorrectas.</span>';
        }
      });

      registerForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const users = loadUsers();
        const username = document.getElementById('registerUser').value.trim();
        const password = document.getElementById('registerPass').value.trim();

        if (users.some((user) => user.username === username)) {
          registerMessage.innerHTML = '<span class="text-warning">Este usuario ya existe.</span>';
          return;
        }

        users.push({ username, password });
        saveUsers(users);
        registerMessage.innerHTML = '<span class="text-success">Usuario creado con éxito.</span>';
        registerForm.reset();
      });

      audioToggle.addEventListener('click', () => {
        if (backgroundAudio.paused) {
          backgroundAudio.play();
          audioToggle.textContent = 'Pause';
        } else {
          backgroundAudio.pause();
          audioToggle.textContent = 'Play';
        }
      });

      audioVolume.addEventListener('input', (event) => {
        backgroundAudio.volume = event.target.value;
      });

      backgroundAudio.volume = audioVolume.value;
    </script>
  </body>
</html>
