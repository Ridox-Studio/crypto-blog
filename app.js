var baseUrl = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false&price_change_percentage=1h"

// var proxyUrl = "https://cors-anywhere.herokuapp.com/"
var apiKey = ""

fetch(`${baseUrl}`, {
    method: "GET",
    headers: {
        'Content-Type': 'application/json',
        'cache-control': 'max-aage+30, public, must-revalidate,s-manage=30',
        'x-access-token': `${apiKey}`,
        'Access-Control-Allow-Origin': '*'
    }
}).then((response) => {
    if(response.ok) {
        response.json().then((json) =>{
        console.log(json)
        let coinsData = json

        if(coinsData.length > 0 ) {
            var cryptoCoins = ""
        }

        //For Loop
        coinsData.forEach((coins) => {
            cryptoCoins += "<tr>"
            cryptoCoins += `<td><img style='width:25px;' src='${coins.image}'> </td>`;
            cryptoCoins += `<td> ${coins.name} </td>`;
            cryptoCoins += `<td> ${coins.symbol} </td>`;
            cryptoCoins += `<td> ${coins.market_cap_rank} </td>`;
            cryptoCoins += `<td> ${coins.market_cap} </td>`;
            cryptoCoins += `<td> ${coins.current_price} </td>`;
            cryptoCoins += `<td> ${coins.price_change_24h} </td>`; "<tr>";
        })
            document.getElementById("data").innerHTML = cryptoCoins
        })
    }
}).catch(error => {
    console.log(error)
})
