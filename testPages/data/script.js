document.addEventListener('DOMContentLoaded', () => {
    fetch('../bme280.php') // Make a GET request to your PHP script
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            const dataContainer = document.getElementById('data-display'); // Get the container element
            if (data.error) {
                dataContainer.innerHTML = `<p>Error: ${data.error}</p>`;
                return;
            }

            // Example: Display data in an unordered list
            let htmlContent = '<ul>';
            data.forEach(item => {
                htmlContent += `<li>ID: ${item.id}, Name: ${item.name}, Email: ${item.email}</li>`;
            });
            htmlContent += '</ul>';
            dataContainer.innerHTML = htmlContent;

            // You can also create a table or other elements dynamically
            // For example, to create a table:
            // let tableHtml = '<table><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody>';
            // data.forEach(item => {
            //     tableHtml += `<tr><td>${item.id}</td><td>${item.name}</td><td>${item.email}</td></tr>`;
            // });
            // tableHtml += '</tbody></table>';
            // dataContainer.innerHTML = tableHtml;

        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            document.getElementById('data-display').innerHTML = `<p>Failed to load data: ${error.message}</p>`;
        });
});