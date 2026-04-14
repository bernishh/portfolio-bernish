<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashbord</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>
    <div class="container">
        <!-- Menu latéral -->
        <aside class="sidebar">
            <div class="logo">
                <h2>👥 RHManager</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Tableau de bord</a></li>
                    <li><a href="#">Employés</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenu principal -->
        <main class="main-content">
            <div class="header">
                <h1>Gestion des employés</h1>
                <button class="btn-ajouter">Ajouter un employé</button>
            </div>

            <div class="search-container">
                <input type="text" placeholder="Rechercher un employé..." class="search-bar">
            </div>

            <table class="employes-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Service</th>
                        <th>Poste</th>
                        <th>Date d'embauche</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Diallo</td>
                        <td>Fatou</td>
                        <td>RH</td>
                        <td>Assistante RH</td>
                        <td>12/03/2022</td>
                    </tr>
                    <tr>
                        <td>Camara</td>
                        <td>Moussa</td>
                        <td>Informatique</td>
                        <td>Développeur</td>
                        <td>20/06/2021</td>
                    </tr>
                    <!-- Tu peux ajouter d'autres lignes ici -->
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>