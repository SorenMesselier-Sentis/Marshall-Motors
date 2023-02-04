<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig',  [
            // parameters usually defined in Symfony login forms
            'error' => $error,
            'last_username' => $lastUsername,

            // OPTIONAL parameters to customize the login form:

            // the translation_domain to use (define this option only if you are
            // rendering the login template in a regular Symfony controller; when
            // rendering it from an EasyAdmin Dashboard this is automatically set to
            // the same domain as the rest of the Dashboard)
            'translation_domain' => 'admin',

            // the title visible above the login form (define this option only if you are
            // rendering the login template in a regular Symfony controller; when rendering
            // it from an EasyAdmin Dashboard this is automatically set as the Dashboard title)
            'page_title' => '<svg style="margin: 10px 0" width="1185" height="208" viewBox="0 0 1185 08" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M882.427 2.6009C886.129 1.2013 890.098 0.653756 894.041 0.999673C897.974 0.673074 901.93 1.23478 905.617 2.64295C909.303 4.05113 912.626 6.26942 915.34 9.1349C918.054 12.0003 920.09 15.4392 921.297 19.1973C922.503 22.9555 922.851 26.9367 922.312 30.847V93.2012C922.565 97.0781 922.02 100.966 920.711 104.624C919.402 108.282 917.356 111.632 914.701 114.467C912.045 117.302 908.836 119.563 905.272 121.108C901.708 122.653 897.865 123.45 893.98 123.45C890.096 123.45 886.253 122.653 882.689 121.108C879.125 119.563 875.916 117.302 873.26 114.467C870.604 111.632 868.559 108.282 867.25 104.624C865.94 100.966 865.396 97.0781 865.649 93.2012V30.847C865.108 26.9258 865.457 22.9334 866.67 19.1656C867.883 15.3978 869.93 11.9518 872.658 9.08399C875.386 6.21616 878.725 4.00053 882.427 2.6009ZM894.041 106.493C899.961 106.493 903.706 102.868 903.706 94.4092V29.6389C903.706 20.8175 899.961 17.5548 894.041 17.5548C888.121 17.5548 884.376 21.18 884.376 29.6389V94.4092C884.376 103.231 888.121 106.493 894.041 106.493ZM445.45 29.277C445.45 37.9776 449.799 44.0194 461.881 54.7743C477.466 68.4293 483.266 78.0962 482.662 92.9596C483.237 96.8773 482.922 100.874 481.74 104.653C480.558 108.433 478.54 111.897 475.835 114.788C473.13 117.68 469.808 119.924 466.116 121.354C462.424 122.784 458.458 123.363 454.511 123.049C436.147 123.049 426.966 112.294 426.966 93.2015V86.4345H444.604V94.6515C444.604 103.715 448.349 106.736 454.269 106.736C460.189 106.736 464.176 104.56 464.176 94.6515C464.176 84.7426 459.948 78.7004 447.867 68.0664C432.281 54.2906 426.966 44.3814 426.966 30.8473C426.429 26.9957 426.763 23.0731 427.944 19.3681C429.125 15.663 431.123 12.2704 433.79 9.44059C436.457 6.61076 439.725 4.41609 443.354 3.01798C446.982 1.61985 450.877 1.05436 454.753 1.36289C472.996 1.36289 481.937 12.2382 481.937 31.2102V36.1643H464.297V30.0021C464.297 21.1807 460.914 17.918 454.994 17.918C449.074 17.918 445.45 20.5765 445.45 29.277ZM0 2.5709H169.143V26.739H0V2.5709ZM0 208C12.817 208 25.1091 202.908 34.1721 193.843C43.235 184.778 48.3265 172.483 48.3265 159.664V38.8232H0V208ZM94.5802 169.675C85.5172 178.739 73.2252 183.832 60.4082 183.832V38.8232H108.735V135.496C108.735 148.315 103.643 160.61 94.5802 169.675ZM154.988 145.506C145.925 154.571 133.633 159.664 120.816 159.664V38.8232H169.143V111.328C169.143 124.147 164.051 136.442 154.988 145.506ZM241.633 88.8511L229.189 2.69175H202.971V121.357H219.161V31.5727L233.176 121.357H248.761L262.655 31.5727V121.357H280.294V2.69175H253.956L241.633 88.8511ZM289.113 121.358L308.444 2.69193H333.695L353.025 121.358H334.419L331.157 98.1556H309.652L306.39 121.358H289.113ZM320.284 21.664L311.948 82.0843H328.741L320.284 21.664ZM417.299 85.5884C417.299 72.296 414.279 63.4745 405.218 60.5743C409.457 58.4529 412.912 55.0386 415.083 50.8246C417.255 46.6107 418.031 41.8153 417.299 37.1312V29.8811C417.299 11.5133 408.963 2.57096 389.633 2.57096H362.449V121.841H381.175V70.9664H386.612C395.069 70.9664 398.694 74.5919 398.694 85.5884V107.34C398.219 112.239 398.796 117.183 400.385 121.841H419.354C417.625 117.255 416.923 112.346 417.299 107.461V85.5884ZM398.694 40.9982C398.694 50.5446 394.466 53.0823 387.579 53.0823H380.813V19.1261H389.27C395.794 19.1261 398.694 22.8721 398.694 31.2101V40.9982ZM531.833 51.028H511.778V2.69175H493.172V121.357H511.778V67.9457H531.833V121.357H550.439V2.69175H531.833V51.028ZM559.259 121.357L578.59 2.69193H604.082L622.687 121.841H604.082L601.424 97.6725H579.918L576.656 121.357H559.259ZM590.55 21.664L582.214 82.0843H599.008L590.55 21.664ZM650.717 2.69175H632.111V121.357H681.404V104.44H650.717V2.69175ZM690.465 2.69175H709.071V104.44H739.758V121.357H690.465V2.69175ZM814.544 88.8511L802.22 2.69175H775.883V121.357H792.193V31.5727L806.087 121.357H821.672L835.566 31.5727V121.357H853.205V2.69175H826.988L814.544 88.8511ZM929.44 19.6094H948.891V121.357H967.618V19.6094H987.069V2.69175H929.44V19.6094ZM1010.77 2.64359C1014.46 1.23542 1018.42 0.673715 1022.35 1.00031C1026.28 0.673715 1030.24 1.23542 1033.92 2.64359C1037.61 4.05177 1040.93 6.27006 1043.65 9.13554C1046.36 12.001 1048.4 15.4398 1049.6 19.198C1050.81 22.9561 1051.16 26.9374 1050.62 30.8476V93.2018C1050.62 100.701 1047.64 107.893 1042.34 113.196C1037.04 118.499 1029.85 121.478 1022.35 121.478C1014.85 121.478 1007.66 118.499 1002.36 113.196C997.056 107.893 994.077 100.701 994.077 93.2018V30.8476C993.539 26.9374 993.885 22.9561 995.092 19.198C996.299 15.4398 998.335 12.001 1001.05 9.13554C1003.76 6.27006 1007.09 4.05177 1010.77 2.64359ZM1022.35 106.494C1028.27 106.494 1032.01 102.869 1032.01 94.4099V29.6395C1032.01 20.8181 1028.27 17.5554 1022.35 17.5554C1016.43 17.5554 1012.68 21.1806 1012.68 29.6395V94.4099C1012.68 103.231 1016.43 106.494 1022.35 106.494ZM1118.64 85.5884C1118.64 72.296 1115.62 63.4745 1106.56 60.5743C1114.89 57.1908 1118.64 49.3361 1118.64 37.1312V29.8811C1118.64 11.5133 1110.3 2.57096 1090.97 2.57096H1063.18V121.841H1081.79V70.9664H1088.19C1096.65 70.9664 1100.27 74.5919 1100.27 85.5884V107.34C1099.87 112.238 1100.44 117.168 1101.97 121.841H1120.93C1119.26 117.241 1118.56 112.344 1118.88 107.461L1118.64 85.5884ZM1099.43 40.9982C1099.43 50.5446 1095.2 53.0823 1088.19 53.0823H1081.43V19.1261H1089.88C1096.53 19.1261 1099.43 22.8721 1099.43 31.2101V40.9982ZM1146.91 29.277C1146.91 37.9776 1151.26 44.0194 1163.34 54.7743C1178.93 68.4293 1184 78.0962 1184 92.9596C1184.6 96.8813 1184.3 100.888 1183.13 104.678C1181.95 108.468 1179.94 111.942 1177.23 114.839C1174.52 117.736 1171.19 119.98 1167.48 121.402C1163.78 122.824 1159.8 123.387 1155.85 123.049C1137.61 123.049 1128.43 112.294 1128.43 93.2015V86.4345H1146.06V94.6515C1146.06 103.715 1149.81 106.736 1155.73 106.736C1161.65 106.736 1165.52 104.56 1165.52 94.6515C1165.52 84.7426 1161.29 78.7004 1149.21 68.0664C1133.62 54.2906 1128.43 44.3815 1128.43 30.8473C1127.89 26.9957 1128.22 23.0731 1129.4 19.3681C1130.58 15.663 1132.58 12.2704 1135.25 9.44059C1137.92 6.61076 1141.19 4.41609 1144.81 3.01798C1148.44 1.61985 1152.34 1.05436 1156.21 1.36289C1174.34 1.36289 1183.28 12.2382 1183.28 31.2102V36.1643H1165.64V30.0021C1165.64 21.1807 1162.25 17.918 1156.33 17.918C1150.41 17.918 1146.91 20.5765 1146.91 29.277Z" fill="#DC040F"/>
                            </svg>',
            

            // the string used to generate the CSRF token. If you don't define
            // this parameter, the login form won't include a CSRF token
            'csrf_token_intention' => 'authenticate',

            // the URL users are redirected to after the login (default: '/admin')
            'target_path' => $this->generateUrl('admin'),

            // the label displayed for the username form field (the |trans filter is applied to it)
            'username_label' => 'Your username',

            // the label displayed for the password form field (the |trans filter is applied to it)
            'password_label' => 'Your password',

            // the label displayed for the Sign In form button (the |trans filter is applied to it)
            'sign_in_label' => 'Log in',

            // the 'name' HTML attribute of the <input> used for the username field (default: '_username')
            'username_parameter' => 'email',

            // the 'name' HTML attribute of the <input> used for the password field (default: '_password')
            'password_parameter' => 'password',

            // whether to enable or not the "forgot password?" link (default: false)
            'forgot_password_enabled' => false,

            // the path (i.e. a relative or absolute URL) to visit when clicking the "forgot password?" link (default: '#')
            'forgot_password_path' => $this->generateUrl('admin', ['...' => '...']),

            // the label displayed for the "forgot password?" link (the |trans filter is applied to it)
            'forgot_password_label' => 'Forgot your password?',

            // whether to enable or not the "remember me" checkbox (default: false)
            'remember_me_enabled' => true,

            // remember me name form field (default: '_remember_me')
            'remember_me_parameter' => 'custom_remember_me_param',

            // whether to check by default the "remember me" checkbox (default: false)
            'remember_me_checked' => true,

            // the label displayed for the remember me checkbox (the |trans filter is applied to it)
            'remember_me_label' => 'Remember me',
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
