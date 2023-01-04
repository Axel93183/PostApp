# PostApp

# Road map

On va créer un site qui permet aux utilisateurs de s'authentifier et d'ajouter des publications:

## Base de donnée

Table: utilisateurs: id, email, nom d'utilisateur et mot de passe

Table: publications: auteurID, titre, image et contenu

## Page login

- Un formulaire pour s'inscrire
- Script pour ajouter un user dans la base de données 

- formulaire de connection 
- script pour verifier si l'utilisateur a donné un email et mot de passe correct
- Stocker les infos id, email, nom d'utilisateur et mot de passe

-
## Page Profil

- Afficher les informations de l'utilisateur (avatar, nom d'utilisateur, email et couverture) 
- un formulaire qui permet à l'utilisateur de créer un nouveau post. 
- Un script (/routes/uploadPost.php), enregistre la publication, et met a jour les post de l'utilisateur dans la base de données

