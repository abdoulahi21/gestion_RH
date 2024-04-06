<!DOCTYPE html>
<html>
<head>
    <title>Contrat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        p {
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Demande de congé</h1>
<div>
    <label>Nom:</label>
    <span>{{$contrat->user->name}}</span>
</div>
<div>
    <label>Date de naissance:</label>
    <span>[Votre date de naissance]</span>
</div>
<div>
    <label>Date de début du contrat:</label>
    <span>{{$contrat->date_debut}}</span>
</div>
<div>
    <label>Date de fin du contrat:</label>
    <span>{{$contrat->date_fin}}</span>
</div>
<div>
    <label>Type de contrat:</label>
    <span>{{$contrat->type_contrats}}</span>
</div>
</body>
</html>
