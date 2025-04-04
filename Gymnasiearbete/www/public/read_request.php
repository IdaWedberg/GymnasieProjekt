<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<a href="write_request.php">Skapa en förfråga</a>
<body>



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

                if (data.length === 0) {
                    postsContainer.innerHTML = '<div class="card"><p>Inga förfrågningar hittades.</p></div>';
                    return;
                }

                data.forEach(request => {
                    const post = document.createElement('div');
                    post.classList.add('request-card');
                    

                    post.innerHTML = `
                        <h3 class="request-title">${request.title}</h3>
                        <div class="request-details">
                            <p><strong>Skapad av:</strong> ${request.username}</p>
                            <p><strong>Nummer:</strong> ${request.phone}</p>
                            <p><strong>Beskrivning:</strong> ${request.description}</p>
                            <p><strong>Plats:</strong> ${request.place}</p>
                            <p><strong>Betalning:</strong> ${request.payment}</p>
                            <p><strong>Datum:</strong> ${request.date}</p>
                        </div>
                        <a href="accept_request.php?username=${encodeURIComponent(request.username)}&phone=${encodeURIComponent(request.phone)}" 
                           class="btn btn-accent">
                            Acceptera
                        </a>
                    `;

                    postsContainer.appendChild(post);
                });

            } catch (error) {
                console.error(error);
                const postsContainer = document.getElementById('posts');
                postsContainer.innerHTML = '<div class="card status-rejected"><p>Ett fel uppstod vid hämtning av förfrågningar.</p></div>';
            }
        }

        // Mobile menu toggle
        document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('show');
        });
    </script>
</body>

</html>