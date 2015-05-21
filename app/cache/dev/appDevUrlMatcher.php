<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/annonces')) {
            // iirt_announcement
            if ($pathinfo === '/annonces/index') {
                return array (  '_controller' => 'Iirt\\AnnouncementBundle\\Controller\\AnnouncementController::indexAction',  '_route' => 'iirt_announcement',);
            }

            if (0 === strpos($pathinfo, '/annonces/a')) {
                // iirt_announcement_add
                if ($pathinfo === '/annonces/ajouter') {
                    return array (  '_controller' => 'Iirt\\AnnouncementBundle\\Controller\\AnnouncementController::ajouterAction',  '_route' => 'iirt_announcement_add',);
                }

                // iirt_announcement_read
                if (0 === strpos($pathinfo, '/annonces/afficher') && preg_match('#^/annonces/afficher/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'iirt_announcement_read')), array (  '_controller' => 'Iirt\\AnnouncementBundle\\Controller\\AnnouncementController::afficherAction',));
                }

            }

            // iirt_announcement_modify
            if (0 === strpos($pathinfo, '/annonces/modifier') && preg_match('#^/annonces/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'iirt_announcement_modify')), array (  '_controller' => 'Iirt\\AnnouncementBundle\\Controller\\AnnouncementController::modifierAction',));
            }

            // iirt_announcement_delete
            if (0 === strpos($pathinfo, '/annonces/supprimer') && preg_match('#^/annonces/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'iirt_announcement_delete')), array (  '_controller' => 'Iirt\\AnnouncementBundle\\Controller\\AnnouncementController::supprimerAction',));
            }

        }

        if (0 === strpos($pathinfo, '/message')) {
            // iirt_message_homepage
            if ($pathinfo === '/message/index') {
                return array (  '_controller' => 'IirtMessageBundle:message:index',  '_route' => 'iirt_message_homepage',);
            }

            // iirt_message_ajout
            if ($pathinfo === '/message/ajouter/{id_teacher, id_student}') {
                return array (  '_controller' => 'Iirt\\MessageBundle\\Controller\\messageController::ajouterAction',  '_route' => 'iirt_message_ajout',);
            }

            // iirt_message_new
            if ($pathinfo === '/message/new') {
                return array (  '_controller' => 'Iirt\\MessageBundle\\Controller\\messageController::newAction',  '_route' => 'iirt_message_new',);
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // iirt_user
            if ($pathinfo === '/user/index') {
                return array (  '_controller' => 'Iirt\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'iirt_user',);
            }

            if (0 === strpos($pathinfo, '/user/a')) {
                // iirt_user_add
                if ($pathinfo === '/user/ajouter') {
                    return array (  '_controller' => 'Iirt\\UserBundle\\Controller\\UserController::ajouterAction',  '_route' => 'iirt_user_add',);
                }

                // iirt_user_read
                if (0 === strpos($pathinfo, '/user/afficher') && preg_match('#^/user/afficher/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'iirt_user_read')), array (  '_controller' => 'Iirt\\UserBundle\\Controller\\UserController::afficherAction',));
                }

            }

            // iirt_user_modify
            if (0 === strpos($pathinfo, '/user/modifier') && preg_match('#^/user/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'iirt_user_modify')), array (  '_controller' => 'Iirt\\UserBundle\\Controller\\UserController::modifierAction',));
            }

            // iirt_user_delete
            if (0 === strpos($pathinfo, '/user/supprimer') && preg_match('#^/user/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'iirt_user_delete')), array (  '_controller' => 'Iirt\\UserBundle\\Controller\\UserController::supprimerAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
