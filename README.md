# PostApp

# Road map

On va créer un site qui permet aux utilisateurs de s'authentifier et d'ajouter des publications:

## Base de donnée

Table: users: id, email, nom d'utilisateur et mot de passe, avatar, couverture DONE

Table: posts: id, auteurID, titre, image et contenu DONE

## Page login

- Un formulaire pour s'inscrire
- Script pour ajouter un user dans la base de données :

    - Créer une page web avec un formulaire permettant à l'utilisateur de saisir son adresse email, son nom d'utilisateur et son mot de passe.

    - Créer une route et une fonction sur le serveur qui seront appelées lorsque l'utilisateur soumettra le formulaire.

    - Dans la fonction du serveur, récupérer les données du formulaire envoyé par l'utilisateur.

    - Vérifier que l'adresse email saisie par l'utilisateur n'est pas déjà utilisée par un autre compte. Si elle est déjà utilisée, renvoyer une erreur à l'utilisateur.

    - Si l'adresse email est valide, insérer les données de l'utilisateur (adresse email, nom d'utilisateur, mot de passe ) dans la table "users" de la base de données "postapp".



- formulaire de connection 
- script pour verifier si l'utilisateur a donné un email et mot de passe correct
- Stocker les infos id, email, nom d'utilisateur et mot de passe

-
## Page Profil

- Afficher les informations de l'utilisateur (avatar, nom d'utilisateur, email et couverture) 
- un formulaire qui permet à l'utilisateur de créer un nouveau post. 
- Un script (/routes/uploadPost.php), enregistre la publication, et met a jour les post de l'utilisateur dans la base de données

## Page d'accueil

- Afficher tous les posts de tout les utilisateurs ordonnés par date. (les plus récents d'abord).
