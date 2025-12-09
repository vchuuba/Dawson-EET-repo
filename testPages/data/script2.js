
function updateSensorData() {
    fetch('bme280.php')
        .then(response => response.json())
        .then(data => {
            let html = '';
            let html2 = '';
            let html3 = '';
            html = `${data.temperature}`;
            document.getElementById('temperature').innerHTML = html;
            html2 = `${data.pressure}`;
            document.getElementById('pressure').innerHTML = html;
            html3 = `${data.altitude}`;
            document.getElementById('altitude').innerHTML = html;
        })
}

setInterval(updateSensorData, 1000);
window.onload = updateSensorData;