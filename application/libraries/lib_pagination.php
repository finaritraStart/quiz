<? php if ( ! defined ( ' BASEPATH ' )) exit ( ' Aucun accès direct au script autorisé ' );  
/ **
 * Bibliothèque de pagination CodeIgniter v2
 *
 * Un assistant de bibliothèque crée la pagination Codeigniter.
 *
* @package          CodeIgniter
* @author           Soyo Solution
 * @créé le 30 juillet 2014
 * @last_update 04 décembre 2014
* @link             http://www.soyosolution.com/
 * @licensed Licensed MIT
 * /
classe  lib_pagination {
    $ CI privé ;
   fonction  __construct () {
       $ this -> CI  = & get_instance ();
       $ this -> CI -> load -> database ();
       $ this -> CI -> load -> helper ( " url " );
       $ this -> CI -> load -> bibliothèque ( " pagination " );
   }
    fonction  create_pagination ( $ pg_config ) {
        // Ne commentez pas de configurer votre propre style de pagination.
        / *
        $ config ['first_link'] = 'First'; // Le texte que vous souhaitez voir affiché dans le "premier" lien à gauche. Si vous ne souhaitez pas que ce lien soit rendu, vous pouvez définir sa valeur sur FALSE.
        $ config ['first_tag_open'] = '<span>'; // La balise d'ouverture du "premier" lien.
        $ config ['first_tag_close'] = '</span>'; // La balise de fermeture du "premier" lien.
        $ config ['last_link'] = 'Last'; // Le texte que vous souhaitez voir affiché dans le "dernier" lien à droite. Si vous ne souhaitez pas que ce lien soit rendu, vous pouvez définir sa valeur sur FALSE.
        $ config ['last_tag_open'] = '<span>'; // La balise d'ouverture du "dernier" lien.
        $ config ['last_tag_close'] = '</span>'; // La balise de fermeture du "dernier" lien.
        
        $ config ['next_link'] = '& gt;'; // Le texte que vous souhaitez afficher dans le lien de la page "suivant". Si vous ne souhaitez pas que ce lien soit rendu, vous pouvez définir sa valeur sur FALSE.
        $ config ['next_tag_open'] = '<span>'; // La balise d'ouverture du lien "suivant".
        $ config ['next_tag_close'] = '</span>'; // La balise de fermeture du lien "suivant".
        
        $ config ['prev_link'] = '& lt;'; // Le texte que vous souhaitez voir affiché dans le lien de la page "précédente". Si vous ne souhaitez pas que ce lien soit rendu, vous pouvez définir sa valeur sur FALSE.
        $ config ['prev_tag_open'] = '<span>'; // La balise d'ouverture du lien "précédent".
        $ config ['prev_tag_close'] = '</span>'; // La balise de fermeture du lien "précédent".
        
        $ config ['cur_tag_open'] = '<b>'; // $ config ['cur_tag_open'] = '<b>';
        $ config ['cur_tag_close'] = '</b>'; // $ config ['cur_tag_close'] = '</b>';
        
        $ config ['num_tag_open'] = '<span>'; // La balise d'ouverture du lien "chiffre".
        $ config ['num_tag_close'] = '</span>'; // La balise de fermeture du lien "chiffre".
        * /
    
        // Vérifiez que la première page, et ne se termine pas par le nom du contrôleur
        $ last_segment  =  $ this -> get_current_url_last_segment ( 1 );
        if ( vide ( $ last_segment )) { // url se termine par '/',
            $ config [ " base_url " ] =  $ this -> get_current_url_without_pagenum () . " / " . $ this -> get_current_url_last_segment ( 2 );
        } else  if ( is_numeric ( $ last_segment )) { // se termine par un nombre, 2
            $ config [ " base_url " ] =  $ this -> get_current_url_without_pagenum ();
        } else { // peut se terminer par le nom du contrôleur
            $ config [ " base_url " ] =  $ this -> get_current_url ();
        }
        // $ config ["base_url"] = (vide ($ last_segment)? $ this-> get_current_url_without_pagenum (). "/". $ this-> get_current_url_last_segment (2): $ this-> get_current_url_without_pagenum ());
        
        // Passage de valeur à la classe de bibliothèque de pagination CI
        $ config [ " total_rows " ]        =  $ this -> record_count ( $ pg_config [ ' sql ' ]);
        $ config [ " per_page " ]          =  $ pg_config [ ' per_page ' ]; // éléments par page
        $ config [ " uri_segment " ]       =  $ this -> CI -> uri -> total_segments ();
        $ config [ ' use_page_numbers ' ] =  TRUE ;
        $ this -> CI -> pagination -> initialize ( $ config );
        $ page_no  = ( $ this -> CI -> uri -> segment ( $ config [ " uri_segment " ]))? $ this -> CI -> uri -> segment ( $ config [ " uri_segment " ]): 0 ;
        
        // Passage de valeur à la fonction get_db_content ()
        $ todb [ ' sql ' ]            =  $ pg_config [ ' sql ' ]; // sql récupère du contrôleur.
        $ todb [ ' limit ' ]          =  $ pg_config [ ' per_page ' ];
        $ todb [ ' page_no ' ]        =  $ page_no ;            
        
        // Valeur pour les vues
        $ data [ " results " ]        =  $ this -> get_db_content ( $ todb );
        $ data [ " pagination " ]     =  $ this -> CI -> pagination -> create_links ();
        $ data [ " result_amount " ] =  $ config [ " total_rows " ];
        retourner  $ data ;
    }
    fonction  record_count ( $ sql ) {
        $ result  =  $ this -> CI -> db -> query ( $ sql );
        return  $ result -> num_rows ();
    }
    fonction  get_db_content ( $ todb ) {
        // calcule la première page
        $ start  = (( $ todb [ ' page_no ' ] - 1 ) * $ todb [ ' limit ' ] >  0 ? ( $ todb [ ' page_no ' ] - 1 ) *  $ todb [ ' limit ' ]: 0 );
        $ query  =  $ todb [ ' sql ' ] . " LIMIT " . $ start . " , " . $ todb [ ' limite ' ] . " ; " ;
        $ result  =  $ this -> CI -> db -> query ( $ query );
 
        if ( $ result -> num_rows () >  0 ) {
            foreach ( $ result -> result () as  $ row ) {
                $ data [] =  $ row ;
            }
            retourner  $ data ;
        }
        retour  faux ;
   }
   
/ * ============= get_current_url () ====================
Obtenir l'url actuelle par la fonction par défaut de PHP
return $ pageURL current_url;
================================================== ================= * /
   fonction  get_current_url () {
        // $ pageURL = base_url (). $ _ SERVER ["REQUEST_URI"];
        $ pageURL  = ( @ $ _SERVER [ " HTTPS " ] ==  " on " )? " https: // " : " http: // " ;
        if ( $ _SERVER [ " SERVER_PORT " ] ! =  " 80 " ) {
            $ pageURL  . =  $ _SERVER [ " SERVER_NAME " ] . " : " . $ _SERVER [ " SERVER_PORT " ] . $ _SERVER [ " REQUEST_URI " ];
            // $ pageURL. = base_url (). $ _ SERVER ["REQUEST_URI"];
        } else {
            $ pageURL  . =  $ _SERVER [ " SERVER_NAME " ] . $ _SERVER [ " REQUEST_URI " ];
        }
        return  $ pageURL ;
   }
/ * ============= get_current_url_without_pagenum () =====================
Il s'agit d'une fonction de retour d'url sans le dernier segment.
renvoie $ url url sans le dernier segment.
================================================== ================= * /
   fonction  get_current_url_without_pagenum () {
        $ url  =  dirname ( $ this -> get_current_url ());
        return  $ url ;
   } // EOF get_current_url ()
   
/ * ============= get_current_url_last_segment () =====================
Récupère le dernier segment de l'URL actuelle par param int.
params $ last_n_segment in int, par exemple 1 est le dernier segment, 2 est l'avant-dernier segment.
renvoie $ segment_content le contenu du segment.
================================================== ================= * /
    fonction  get_current_url_last_segment ( $ last_n_segment ) {
        $ pageURL  =  $ this -> get_current_url ();
        $ pageURL  =  exploser ( ' / ' , $ pageURL );
        $ segment_content  =  $ PAGEURL [ sizeof ( $ PAGEURL ) - $ last_n_segment ];
        return  $ segment_content ;
    } // EOF get_current_url ()   
   
}
? >