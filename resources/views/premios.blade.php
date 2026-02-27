<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Premios - ICC</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #003366;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }
        .header span {
            font-size: 48px;
            font-weight: bold;
            color: gold;
            font-family: 'Arial Black', sans-serif;
        }

        h2 { text-align: center; color: white; }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .input-row { display: flex; gap: 10px; }

        input {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            background-color: #FFD700;
            color: #003366;
            transition: 0.2s;
        }
        button:hover { background-color: #FFC300; }

        .grid-container { position: relative; display: flex; justify-content: center; width: max-content; margin-bottom: 30px; }

        .logo-fondo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            width: 250px;
            height: 250px;
            opacity: 0.1;
            z-index: 0;
            transition: transform 0.2s ease-in-out;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 150px);
            gap: 10px;
            z-index: 1;
            position: relative;
        }

        .premio {
            width: 150px;
            height: 150px;
            border: 3px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            background-color: white;
            transition: 0.2s;
            border-radius: 10px;
        }

        .activo { background-color: yellow; border: 3px solid red; }

        .ganador { background-color: limegreen; border: 4px solid green; }

        .info { text-align: center; color: white; }
        .info p { margin: 5px 0; }
    </style>
</head>
<body>

<div class="header">
    <span>ICC</span>
    <h2>Registro del Participante</h2>
</div>

<form method="POST" action="/guardar">
    @csrf
    <div class="input-row">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="escuela" placeholder="Escuela" required>
    </div>
    <button type="button" onclick="iniciarRuleta()">Participar</button>
    <button type="submit" id="submitBtn" style="display:none;">Guardar</button>
</form>

<h2>Premios</h2>

<div class="grid-container">
    <img src="/images/unicah-escudo.png" alt="Logo UNICAH" class="logo-fondo" id="logoFondo">
    <div class="grid" id="grid">
        @foreach($premios as $index => $premio)
            <div class="premio" data-index="{{ $index }}">
                {{ $premio }}
            </div>
        @endforeach
    </div>
</div>

<div class="info">
    <h2>Participantes</h2>
    @foreach($participantes as $p)
        <p><strong>{{ $p->nombre }}</strong> - {{ $p->escuela }} ganó {{ $p->premio }}</p>
    @endforeach
</div>

<script>
function iniciarRuleta() {
    const premios = document.querySelectorAll('.premio');
    const logo = document.getElementById('logoFondo');

    const ganadorIndex = Math.floor(Math.random() * premios.length);
    const ganadorPremio = premios[ganadorIndex].textContent.trim();

    let actual = 0;
    let vueltas = 0;
    let maxVueltas = 60;
    let velocidad = 50;

    // Sonidos
    const tickSound = new Audio('/sounds/tick.mp3');
    tickSound.volume = 0.5;
    tickSound.preload = "auto";

    const winnerSound = new Audio('/sounds/winner.mp3');
    winnerSound.volume = 0.8;
    winnerSound.preload = "auto";

    function girar() {
        let scale = 1 + 0.05 * Math.sin(vueltas / 2);
        logo.style.transform = `translate(-50%, -50%) scale(${scale})`;

        premios.forEach(p => p.classList.remove('activo'));
        premios[actual].classList.add('activo');

        // Sonido tick
        tickSound.currentTime = 0;
        tickSound.play().catch(e => console.log("Tick bloqueado:", e));

        if (vueltas >= maxVueltas && actual === ganadorIndex) {
            premios.forEach(p => p.classList.remove('activo'));
            premios[ganadorIndex].classList.add('ganador');

            // Sonido ganador
            winnerSound.play().catch(e => console.log("Winner bloqueado:", e));

            // Guardar premio en formulario antes de alert
            const form = document.querySelector('form');
            let premioInput = document.createElement('input');
            premioInput.type = 'hidden';
            premioInput.name = 'premio';
            premioInput.value = ganadorPremio;
            form.appendChild(premioInput);

            // Esperar un poquito para que se escuche el sonido ganador
            setTimeout(() => {
                alert("¡Felicidades! Ganaste: " + ganadorPremio);
                form.submit();
            }, 500); // 0.5s delay para que el sonido se reproduzca
        } else {
            actual = (actual + 1) % premios.length;
            vueltas++;
            if (vueltas > maxVueltas * 0.7) velocidad += 15;
            setTimeout(girar, velocidad);
        }
    }

    girar();
}
</script>

</body>
</html>