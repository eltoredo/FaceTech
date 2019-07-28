<?php

function erreur_index($code)
{
	$messages = array(
		'Inscription réussie !',
		'Vous n\'avez pas rempli tous les champs d\'inscription !',
		'Un compte avec cette adresse mail existe déjà !',
		'Votre mail n\'est pas format de l\'école !',
		'Les mots de passe ne sont pas identiques !',
		'Le mot de passe doit faire entre 5 et 50 caractères !',
		'Vous n\'avez pas rempli tous les champs de connexion !',
		'Identifiant ou mot de passe incorrect !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_commenter_projet($code)
{
	$messages = array(
		'Vous n\'avez rien entré !',
		'Votre message est trop long !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_commenter_cours($code)
{
	$messages = array(
		'Vous n\'avez rien entré !',
		'Votre message est trop long !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_modifier_commentaire($code)
{
	$messages = array(
		'Vous n\'avez rien entré !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_chat($code)
{
	$messages = array(
		'Vous n\'avez rien entré !',
		'Votre message est trop long !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_modifier_profil($code)
{
	$messages = array(
		'Le changement de profil a été effectué avec succès !',
		'Votre avatar est trop gros ou l\'extension n\'est pas autorisée !',
		'Vous n\'avez pas entré votre mot de passe !',
		'Le mot de passe entré est invalide !',
		'Les nouveaux mots de passe entrés ne correspondent pas !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_poster_projet($code)
{
	$messages = array(
		'Le post a été effectué avec succès !',
		'Vous n\'avez pas rempli tous les champs !',
		'Votre titre de projet est trop long !',
		'Le nombre de membres est trop élevé !',
		'Votre description ne doit pas dépasser les 2400 caractères !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_modifier_projet($code)
{
	$messages = array(
		'Modification effectuée avec succès !',
		'Vous n\'avez pas entré le titre du projet !',
		'Vous n\'êtes pas le chef de ce projet !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_ajouter_membre($code)
{
	$messages = array(
		'Vous n\'avez rien entré !',
		'Ce membre n\'existe pas !',
		'Ce membre fait déjà partie de votre équipe !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_poster_cours($code)
{
	$messages = array(
		'Le post a été effectué avec succès !',
		'Vous n\'avez pas rempli tous les champs !',
		'Votre titre de projet est trop long !',
		'Votre description ne doit pas dépasser les 2400 caractères !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

function erreur_modifier_cours($code)
{
	$messages = array(
		'Modification effectuée avec succès !',
		'Vous n\'avez pas entré le titre du cours !',
		'Vous n\'êtes pas le propriétaire de ce cours !',
	);
	return ($code < count($messages) ? $messages[$code] : '');
}

?>