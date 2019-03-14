<?php
/*
Plugin Name: Button Widget by Loomisoft
Plugin URI:  http://www.loomisoft.com/button-widget-wordpress-plugin/
Description: Loomisoft's Button Widget plugin provides a widget that allows you to place highly customisable link buttons in your sidebars, footers and other widgetised areas. The plugin is designed to be very intuitive and simple, but provides a huge amount of flexibility and versatility in defining the button's text, background, borders, paddings and hover characteristics, making it easy to fit in with the look and feel of the website.
Version:     1.2.1
Author:      Loomisoft
Author URI:  http://www.loomisoft.com/
License:     GNU General Public License v3.0
*/

/*
Copyright (c) 2017 Loomisoft (www.loomisoft.com). All rights reserved.

The Loomisoft Button Widget plugin is distributed under the GNU General Public License, Version 3 or later.
You should have received a copy of the GNU General Public License along with the Loomisoft Button Widget
plugin files. If not, see <http://www.gnu.org/licenses/>.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED
WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR
TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

defined( 'ABSPATH' ) or die();

define( 'LS_BW_PLUGIN', __FILE__ );
define( 'LS_BW_PLUGIN_PATH', plugin_dir_path( LS_BW_PLUGIN ) );

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
require_once( LS_BW_PLUGIN_PATH . 'includes/ls_bw_main.php' );
require_once( LS_BW_PLUGIN_PATH . 'includes/ls_bw_widget.php' );

ls_bw_main::start( LS_BW_PLUGIN );

