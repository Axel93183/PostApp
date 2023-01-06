# ROADMAP

## Login

## Inscription

- Ajouter un formulaire pour l'inscription avec. DONE ✓
  Le formlaure envoi les données vers la route: /route/signup.php:
  - Un input pour l'email. DONE ✓
  - Un input pour le username. DONE ✓
  - Un input pour le password. DONE ✓
  - Un input pour confirmer le password. DONE ✓

- Ajouté le script pour l'inscription: /routes/signup.php:
  - Verifier si les données existe dans la requete. DONE ✓ var_dump();
  - Utiliser le controller pour verifier les données.  DONE ✓ (var_dump(); pour savoir si ?)
  - Rediriger l'utilisateur si les données sont mauvaises.  DONE ✓
  - Verifier si l'utilisateur n'existe pas deja. DONE ✓
  - Rediriger l'utilisateur si il existe deja. DONE ✓
  - Utiliser le controller pour Enregistrer l'utilsateur. DONE ✓
  - Rediriger l'utilisateur une fois que l'inscription est faites. DONE ✓
Varifier dans la bases de données si ca marche!! DONE ✓

## Connexion

- Ajouter un formulaire pour la connexion avec: DONE ✓
Le formlaure envoi les données vers la route: /route/signin.php: DONE ✓
  - Un input pour l'email DONE ✓
  - Un input pour le password DONE ✓

- Ajouté le script pour l'inscription: /route/signin.php: 
  - Verifier si les données existe dans la requete DONE
     - Utiliser le controller pour verifier les données.  
  - Rediriger l'utilisateur si les données sont mauvaises.  
  - Utiliser le controller pour verifier si l'utilsateur existe.DONE
  - Rediriger l'utilisateur si  l'utilsateur n'existe pas.  DONE





  - Verifier si le mot de passe est bon. 



  - Rediriger si le mot de passe n'est pas bon.
  - Utiliser la session pour enregistrer les données de l'utilisateur.  
  - Rediriger l'utilisateur vers la page de profil.  DONE
[16:44]
## Profil

- Afficher les infos de l'utilisateur:
  - Afficher la couverture.
  - Afficher l'avatar'.
  - Afficher le username.

- Ajouté le formulaire pour changer la couverture ou l'avatar: /routes/updateInfos.php.

- Ajouter un formulaire pour ajouter un post: /routes/addPost.php
  - Le formulaire contient:
    - Un input pour le titre
    - Une textarea pour le contenu
    - Un image optionelle.
  - La routes doit:
    - Utiliser le controller (PostController) pour verifier si le titre et le contenu sont bons.
    - Utiliser le controller et le model pour ajouter le post dans la base de données.

- Afficher tous les posts de l'utilisateur:
  - Utiliser le controlleur et le model pour recuperer les posts de l'utilisateur.

## Accueil

- Utiliser le controlleur et le model pour recuperer tous les posts.
- Les ordonner par date
- Les afficher dans la page.