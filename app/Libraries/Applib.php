<?php

namespace App\Libraries;

use App\City;
use App\User;
use App\FAQCategory;
use App\CategoryMenu;
use App\Game;
use App\Matches;
use App\Menu;
use App\MenuItems;
use App\Modul;
use App\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Applib 
{
	public static function WebMenu($id)
    {
        $menu            = Menu::where('id',$id)->with('items')->first();
        $public_menu     = $menu->items;
        return $public_menu;
        
	}
	
	public static function select($name = "menu", $menulist = array())
    {
        $html = '<select name="' . $name . '">';

        foreach ($menulist as $key => $val) {
            $active = '';
            if (request()->input('menu') == $key) {
                $active = 'selected="selected"';
            }
            $html .= '<option ' . $active . ' value="' . $key . '">' . $val . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public static function getByName($name)
    {
        $menu = Menu::byName($name);
        return is_null($menu) ? [] : self::get($menu->id);
    }

    public static function get($menu_id)
    {
        $menuItem = new MenuItems();
        $menu_list = $menuItem->getall($menu_id);

        $roots = $menu_list->where('menu', (integer) $menu_id)->where('parent', 0);

        $items = self::tree($roots, $menu_list);
        return $items;
    }

    private static function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            $find = $all_items->where('parent', $item->id);

            $data_arr[$i]['child'] = array();

            if ($find->count()) {
                $data_arr[$i]['child'] = self::tree($find, $all_items);
            }

            $i++;
        }

        return $data_arr;
    }

    public static function menupage(){
        $querypages     = Page::orderBy('id','ASC')->get();
        foreach ($querypages as $pages){
        echo "<tbody>
                <td>
                    $pages->nama_laman
                </td>
                <td align='center'>
                    <a  href='#' data-url='$pages->pages_seo' data-title='$pages->nama_laman'class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
                    <span class='spinner' id='spinkategori'></span>
                 </td>
            </tbody>";
        }
    }
    public static function menukategori(){
        $query     = CategoryMenu::where('_parent','=','1')->get();
        foreach ($query as $pages){
        echo "<tbody>
                <td>
                    $pages->kategori
                </td>
                <td align='center'>
                    <a href='#' data-url='article/$pages->_slug' data-title='$pages->kategori' class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
                    <span class='spinner' id='spinkategori'></span>
                 </td>
            </tbody>";
        }
    }
    public static function menumodul(){
        $query     = Modul::all();
        foreach ($query as $modul){
        echo "<tbody>
                <td>
                    $modul->nama
                </td>
                <td align='center'>
                    <a href='#' data-url='$modul->url_modul' data-title='$modul->nama' class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
                    <span class='spinner' id='spinkategori'></span>
                 </td>
            </tbody>";
        }
    }
    // public static function menuproduk(){
    //     $query     = Produk::all();
    //     foreach ($query as $produk){
    //         $slug= Str::slug($produk->judul,'-');
    //     echo "<tbody>
    //             <td>
    //                 $produk->judul
    //             </td>
    //             <td align='center'>
    //                 <a href='#' data-url='$slug' data-title='$produk->judul' class='button-secondary tambahkan-ke-menu right'  >Add <i class='fa fa-sign-out'></i> </a>
    //                 <span class='spinner' id='spinkategori'></span>
    //              </td>
    //         </tbody>";
    //     }
    // }

    public static function getFaqCategoryID($id){
        $query                      = FAQCategory::where('id','=',$id)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->nama_kategori;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	
	public static function getCityID($id){
        $query                      = City::where('id_kabkota','=',$id)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->nama_kabkota;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
    }
    
    public static function getUsername($user_id){
        $query                      = User::where('id','=',$user_id)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->username;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
    }
    
    public static function getGame($id){
        $query                      = User::where('id','=',$id)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->title;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
    }

    public static function carigameID($slug){
        $query                      = Game::where('slug','=',$slug)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->id;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
    }

    public static function carimatchID($slug){
        $query                      = Matches::where('match_slug','=',$slug)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->id;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
    }

    public static function caricategoryID($category_slug){
        $query                      = Game::where('category_id','=',$category_slug)->get();
		if($query->count() > 0){
			foreach($query as $h){
				$hasil = $h->id;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
    }
    
    public static function expired($id,$selisih) {
        $query          = " UPDATE jobs";
        $query_parent   = " SET expired = 0";
        $query_ids      = " WHERE DATEDIFF(CURDATE(),batas_waktu) > $selisih AND id =$id";
        DB::update($query.$query_parent.$query_ids);
   }
   public static function updatehits($id,$baca) {
        $query          = " UPDATE jobs";
        $query_parent   = " SET hits = $baca + 1";
        $query_ids      = " WHERE id =$id";
        DB::update($query.$query_parent.$query_ids);
   }
   public static function updatehitsblog($id,$baca) {
        $query          = " UPDATE blogs";
        $query_parent   = " SET hits = $baca + 1";
        $query_ids      = " WHERE id =$id";
        DB::update($query.$query_parent.$query_ids);
   }
}