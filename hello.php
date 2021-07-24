<?php

/**
 * Plugin Name: Hello l'ovni
 * Plugin URI: https://thomaspericoi.com/projects/hello-ovni/
 * Description: J'ai "emprunté" le code du plugin de Matt Mullenweg "Hello Dolly" pour en faire quelque chose de bien mieux. Une fois activé, <strong>vous verrez les paroles du chef d'oeuvre "<cite>On m'appelle l'ovni</cite>"</strong> en haut à droite dans votre interface administrateur.
 * Version: 1.0
 * Author: Thomas Pericoi
 * Author URI: https://thomaspericoi.com/
 */

function hello_ovni_get_lyric()
{
	$lyrics = "On m'appelle l'ovni
	On m'appelle l'ovni
	On m'appelle l'ovni
	On m'appelle l'ovni
	On m'appelle l'ovni
	Je suis parti, je squatte plus le béton
	J'aide mes potes qui sont bés-tom
	Je sers, que ça retourne son veston
	Ils se reconnaissent dans mes sons
	Alcoolisé au guidon, je fais des doigts d'honneurs aux schmits
	Faut voir ce que nous vivons entre les histoires et les flûtes
	Que ça mitonne, oh oh
	Même plus je m'étonne, oh oh
	Et si mon heure sonne, oh oh
	Pleure pas rigole, oh oh (l'ovni)
	J'ai ma team, pour ça que je m'en tape de la promo' (l'ovni)
	J'ai la rime, je peux y arriver, ça serait beau (l'ovni)
	Je cours après le temps, je suis loin de tout
	Que ils parlent de moi, ils me cassent les couilles
	Je suis dans l'insomnie (on m'appelle l'ovni)
	Je suis dans l'insomnie (on m'appelle l'ovni)
	Je sais même plus et ouais mec
	On parle plus, ils jalousent
	On a le truc, je les comprends pas, faut que je parle cru (l'ovni)
	Trop d'attente, peut-être que je sors trop d'albums
	Je sais pas, je trouve ça sombre
	Ma team me dit : \"c'est la bombe\"
	Regarde, je fais comme je peux
	Je ne sais pas dire non, c'est fini
	Nous aurons plus, c'est trop loin que nous visons
	Ils me critiquent
	Oh le bâtard que il chenef, il s'attarde et ouais
	Fais le signe Jul sans plaque quand tu grilles le radar (l'ovni)
	La galère, oui, on l'a connue
	Couteau dans la plaie, ils aimeraient qu'on remue (l'ovni)
	T'es un deuhman, je te donne un faux num'
	Non (l'ovni)
	Je cours après le temps, je suis loin de tout (l'ovni)
	Que ils parlent de moi, ils me cassent les couilles (l'ovni)
	Je suis dans l'insomnie (on m’appelle l'ovni)
	Je suis dans l'insomnie (on m’appelle l'ovni)
	On m’appelle l'ovni
	On m’appelle l'ovni
	Je cours après le temps, je suis loin de tout
	Que ils parlent de moi, ils me cassent les couilles
	Je suis dans l'insomnie (on m’appelle l'ovni)
	Je suis dans l'insomnie (on m’appelle l'ovni)
	Je cours après le temps, je suis loin de tout (l'ovni)
	Que ils parlent de moi, ils me cassent les couilles (l'ovni)
	Je suis dans l'insomnie (on m’appelle l'ovni)
	Je suis dans l'insomnie (on m’appelle l'ovni)
	On m'appelle l'ovni
	On m'appelle l'ovni
	On m'appelle l'ovni
	L'ovni";

	$lyrics = explode("\n", $lyrics);

	return wptexturize($lyrics[mt_rand(0, count($lyrics) - 1)]);
}

function hello_ovni()
{
	$chosen = hello_ovni_get_lyric();
	$lang   = '';
	if ('fr_' !== substr(get_user_locale(), 0, 3)) {
		$lang = ' lang="fr"';
	}

	printf(
		'<p id="ovni"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__('Citation de la chanson "On m\appelle l\'ovni :', 'hello-dolly'),
		$lang,
		$chosen
	);
}

add_action('admin_notices', 'hello_ovni');

function ovni_css()
{
	echo "
	<style type='text/css'>
	#ovni {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #ovni {
		float: left;
	}
	.block-editor-page #ovni {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#ovni,
		.rtl #ovni {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action('admin_head', 'ovni_css');
