// Pc Price Picker

function calculateCost() {
    // Get selected values from dropdowns
    var cpuCost = parseInt(document.getElementById('cpu').value);
    var gpuCost = parseInt(document.getElementById('gpu') .value);
    var ramCost = parseInt(document.getElementById('ram').value);
    var psuCost = parseInt(document.getElementById('psu').value);
    var moboCost = parseInt(document.getElementById('mobo').value);
    var storageCost = parseInt(document.getElementById('storage').value);
    var caseCost = parseInt(document.getElementById('case').value);

    // Calculate total cost
    var totalCost = cpuCost + gpuCost + ramCost + psuCost + moboCost + storageCost + caseCost;

    // Display total cost in the span element
    document.getElementById('totalCost').textContent = totalCost;
}



// Bitcoin price Widget

document.addEventListener('DOMContentLoaded', () => {
    const priceElement = document.getElementById('price');
    const updateTimeElement = document.getElementById('update-time');

    // Function to fetch Bitcoin price from the API
    function fetchBitcoinPrice() {
        // Replace this URL with a reliable Bitcoin price API
        const apiUrl = 'https://api.coindesk.com/v1/bpi/currentprice/BTC.json';

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const price = data.bpi.USD.rate;
                const updateTime = new Date(data.time.updated).toLocaleTimeString();

                priceElement.textContent = `Price: $ ${price}`;
                updateTimeElement.textContent = `Last updated: ${updateTime}`;
            })
            .catch(error => {
                console.error('Error fetching Bitcoin price:', error);
            });
    }

    // Function to update the Bitcoin price and time
    function updateBitcoinData() {
        // Call the function to fetch Bitcoin price
        fetchBitcoinPrice();
    }

    // Call the function to fetch Bitcoin price initially
    updateBitcoinData();

    // Update the Bitcoin price every 30 seconds
    setInterval(updateBitcoinData, 30000);
});


