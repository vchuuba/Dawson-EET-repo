
function updateSensorData() {
    fetch('bme280.php')
        .then(response => response.json())
        .then(data => {
            let html = '';
            // if (data.error) {
            //     html = `<div class="data-box">
            //                 <h2>Error</h2>
            //                 <p>${data.error}</p>
            //             </div>`;
            // } else {
                html = `<div class="data-box">
                            <h1>Current Sensor Readings</h1>
                            <p>Temperature: ${data.temperature} °C</p>
                            <p>Pressure: ${data.pressure} hPa</p>
                            <p>Altitude: ${data.altitude} m</p>
                        </div>`;
            // }
            document.getElementById('sensor-data').innerHTML = html;
        })
        // .catch(error => {
        //     document.getElementById('sensor-data').innerHTML = `<div class="data-box"><h2>Error</h2><p>Could not fetch data.</p></div>`;
        // });
}

setInterval(updateSensorData, 1000);
window.onload = updateSensorData;