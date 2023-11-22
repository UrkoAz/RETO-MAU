let tiempoInicio;
let tiempoPausado = 0;
let cronometroActivo = false;
    function iniciarCronometro() {
        if (!cronometroActivo) {
                if (tiempoPausado === 0) {
                    tiempoInicio = new Date().getTime();
                } else {
                    tiempoInicio = new Date().getTime() - tiempoPausado;
                    tiempoPausado = 0;
                }

                cronometroActivo = true;
                actualizarCronometro();
        }
    }
    function detenerCronometro() {
        cronometroActivo = false;
        tiempoPausado = new Date().getTime() - tiempoInicio;
    }
    function reiniciarCronometro() {
        cronometroActivo = false;
        tiempoPausado = 0;
        document.getElementById("cronometro").innerHTML = "00:00:00";
    }
    function actualizarCronometro() {
        if (cronometroActivo) {
            let tiempoActual = new Date().getTime();
            let tiempoTranscurrido = tiempoActual - tiempoInicio;
    
            let segundosTotales = Math.floor(tiempoTranscurrido / 1000);
            let horas = Math.floor(segundosTotales / 3600);
            let minutos = Math.floor((segundosTotales % 3600) / 60);
            let segundos = segundosTotales % 60;
    
            // Agrega un cero delante si son menores a 10
            horas = horas < 10 ? "0" + horas : horas;
            minutos = minutos < 10 ? "0" + minutos : minutos;
            segundos = segundos < 10 ? "0" + segundos : segundos;

            document.getElementById("cronometro").innerHTML = `${horas}:${minutos}:${segundos}`;

            setTimeout(actualizarCronometro, 1000);
        }
    }

    function enviarCronometro(){
        var valorCronometro = document.getElementById("cronometro").value;
    }

document.getElementById("Btn_Iniciar").addEventListener("click", iniciarCronometro);
document.getElementById("Btn_Detener").addEventListener("click", detenerCronometro);
document.getElementById("Btn_Reiniciar").addEventListener("click", reiniciarCronometro);
document.getElementById("Btn_Enviar").addEventListener("click", enviarCronometro);