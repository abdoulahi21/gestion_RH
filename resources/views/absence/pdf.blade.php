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
<h1>Demande d'absence</h1>
<div>
    <label>Nom:</label>
    <span>{{$absence->user->name}}</span>
</div>
<div>
    <label>Date de début :</label>
    <span>{{$absence->date_debut}}</span>
</div>
<div>
    <label>Date de fin :</label>
    <span>{{$absence->date_fin}}</span>
</div>
<div>
    <label>Type d'absence:</label>
    <span>{{$absence->type_absences}}</span>
</div>
</body>
</html>
