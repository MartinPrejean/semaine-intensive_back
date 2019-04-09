var xhr = new XMLHttpRequest();

xhr.addEventListener('readystatechange', function()
{
    if(xhr.readyState === XMLHttpRequest.DONE)
    {
        if(xhr.status === 200)
        {
            var result = JSON.parse(xhr.responseText);
            console.log(xhr.responseText)
        }
    }
});

xhr.open(
    'GET',
    'https://api.openweathermap.org/data/2.5/weather?q=Paris&appid=bcaa6562b6f350377b6be620691f0c80', 
    true
);

window
    .fetch('https://api.openweathermap.org/data/2.5/weather?q=Paris&appid=bcaa6562b6f350377b6be620691f0c80')
    .then((_response) => _response.json())
    .then((_result) =>
    {
        console.log(_result)
    })

