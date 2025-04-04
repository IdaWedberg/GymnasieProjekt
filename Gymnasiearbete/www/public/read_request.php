<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<a href="write_request.php">Skapa en förfråga</a>
<hr>
    <section id="posts"></section>

    <script>
        getRequests();
        async function getRequests() {
            try {
                const response = await fetch('api/requestsApi.php');
                const data = await response.json();
                console.log(data);

                const postsContainer = document.getElementById('posts');
                postsContainer.innerHTML = ''; // Rensa innan vi lägger till nya element

                data.forEach(request => {
                    const post = document.createElement('section');
                    post.classList.add('post');

                    post.innerHTML = `
                    <h1>${request.title}</h1>
                    <p id="POSTname"><strong>Skapad av: </strong> ${request.username}</p>
                    <p><strong> Nummer: </strong>${request.phone}</p>
                    <p><strong>Beskrivning: </strong> ${request.description}</p>
                    <p><strong>Plats: </strong> ${request.place}</p>
                    <p><strong>Betalning: </strong> ${request.payment}</p>
                    <p><strong>Datum: </strong> ${request.date}</p>
                        <a href="accept_request.php?username=${encodeURIComponent(request.username)}&phone=${encodeURIComponent(request.phone)}">
        Acceptera
    </a>
                    <hr>
                `;

                    postsContainer.appendChild(post);
                });

            } catch (error) {
                console.error(error);
            }
        }
    </script>
</body>

</html>