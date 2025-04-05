<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VOTEM! - Plataforma Corporativa de Votação</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, sans-serif;
      margin: 0;
      background: #fff;
      color: #333;
    }

    header {
      background: #F57C00;
      color: white;
      padding: 2rem 1rem;
      text-align: center;
    }

    header img {
      max-width: 300px;
      height: auto;
    }

    header h1 {
      margin: 0;
      font-size: 3rem;
      letter-spacing: 2px;
    }

    header p {
      font-size: 1.2rem;
      margin-top: 0.5rem;
    }

    section {
      padding: 3rem 1rem;
      max-width: 960px;
      margin: auto;
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: center;
    }

    .feature {
      flex: 1 1 280px;
      background: #FFF3E0;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .feature h3 {
      color: #F57C00;
      margin-top: 0;
    }

    footer {
      background: #37474F;
      color: #fff;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
    }

    @media (max-width: 600px) {
      header h1 {
        font-size: 2.2rem;
      }

      section {
        padding: 2rem 1rem;
      }
    }
  </style>
</head>
<body>

  <header>
    <img src="{{ asset('img/logo.png') }}" alt="VOTEM!" />
  </header>

  <section>
    <h2>Por que escolher o VOTEM! para sua organização?</h2>
    <div class="features">
      <article class="feature">
        <h3>🔐 Compliance Total</h3>
        <p>Desenvolvido com foco na LGPD e outras normas de proteção de dados. Garante rastreabilidade, autenticação e integridade em cada voto.</p>
      </article>

      <article class="feature">
        <h3>📱 100% Responsivo</h3>
        <p>Acesse via celular, tablet ou computador. Ideal para executivos, colaboradores e conselhos votarem de onde estiverem.</p>
      </article>

      <article class="feature">
        <h3>⚡ Resultados em Tempo Real</h3>
        <p>Contagem automática, dashboards e relatórios atualizados em tempo real para total transparência nas decisões.</p>
      </article>

      <article class="feature">
        <h3>🧠 Arquitetura Inteligente</h3>
        <p>Baseado em Laravel 12 + Livewire, o VOTEM! é leve, rápido e extensível para atender demandas personalizadas.</p>
      </article>
    </div>
  </section>

  <footer>
    &copy; 2025 VOTEM! Todos os direitos reservados. | Desenvolvido por BrasiData
  </footer>

</body>
</html>