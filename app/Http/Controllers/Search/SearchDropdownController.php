<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lc_region;
use App\Models\Lc_country;
use App\Models\Lc_post;
use App\Models\Lc_picture;
use App\Models\Lc_review;

class SearchDropdownController extends Controller
{
    // CUSTOM SHOW POST IN EZEAD.COM
    public function getPostEzead()
    {
        $ezeadPosts = Lc_post::where('price', '>', 0)
            ->where('user_id', auth('customer')->user()->id)
            ->take(12)
            ->get();
        $ezead_post_html = '';
        foreach ($ezeadPosts as $post) {
            $ezeadPostReviewCount = Lc_review::where('post_id', $post->id)->count();
            $ezeadPostReview = Lc_review::where('post_id', $post->id)->first();
            $ezeadPictures = Lc_picture::where('post_id', $post->id)->first();
            $titleWithoutSpaces = str_replace(' ', '-', $post->title);
            $ezead_post_html .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 px-1">';
            $ezead_post_html .= '<div class="item px-2 my-4 shadow-lg p-2 bg-white rounded" style="height: 320px;">';
            $ezead_post_html .= '<a target="_blank" href="https://ezead.com/' . $titleWithoutSpaces . '/' . $post->id . '" class="custom-column">';
            $ezead_post_html .= '<img src="https://ezead.com/storage/' . $ezeadPictures->filename . '" style="margin-top: 0px; width: 200px; height: 180px; opacity: 1;">';
            $ezead_post_html .= '<h6 class="pt-3">' . str($post->title)->limit(30) . '</h6>';
            $ezead_post_html .= '<p style="color:#9a9a9a;font-weight:800;">';
            if ($ezeadPostReview !== null) {
                if ($ezeadPostReviewCount <= 1) {
                    $review = " review";
                } else {
                    $review = " reviews";
                }
                if ((int)$ezeadPostReview->rating == 5) {
                    $ezead_post_html .= '<i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i> '
                        . (int)$ezeadPostReviewCount . $review;
                } elseif ((int)$ezeadPostReview->rating == 4) {
                    $ezead_post_html .= '<i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i> '
                        . (int)$ezeadPostReviewCount . $review;
                } elseif ((int)$ezeadPostReview->rating == 3) {
                    $ezead_post_html .= '<i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i> '
                        . (int)$ezeadPostReviewCount . $review;
                } elseif ((int)$ezeadPostReview->rating == 2) {
                    $ezead_post_html .= '<i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i> '
                        . (int)$ezeadPostReviewCount . $review;
                } elseif ((int)$ezeadPostReview->rating == 1) {
                    $ezead_post_html .=
                        '<i class="fas fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i> '
                        . (int)$ezeadPostReviewCount . $review;
                }
            } else {
                $ezead_post_html .= '<i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                     <i class="far fa-star" style="color:#ffc32b"></i>
                                        0 review';
            }
            $ezead_post_html .= '</p>';
            $ezead_post_html .= '<p style="color:#d5590e;font-weight:800;text-align:center">$' . $post->price . '</p>';
            $ezead_post_html .= '</a>';
            $ezead_post_html .= '</div>';
            $ezead_post_html .= '</div>';
        }
        $data_html = [
            'ezead_post_html' => $ezead_post_html
        ];
        return $data_html;
    }

    // CUSTOM PROVINCE, REGION, CITY, NEIGHBOUR
    public function getSearchLocation(Request $request)
    {
        $countries = '';
        $provinces = '';
        $regions = '';
        $cities = '';
        $neighbours = '';
        // COUNTRY
        $search_countries = Lc_country::all();
        if ($search_countries != null) {
            foreach ($search_countries as $key => $value) {
                if ($value->code != 'LP' && $value->active == '1') {
                    $nameEN = json_decode($value->name);
                    $countries .= '<option value="' . $value->code . '">' . $nameEN->en . '</option>';
                }
            }
        }
        // PROVINCE
        $search_provinces = Lc_region::where('code', $request->countryCode)->first();
        if ($search_provinces != null) {
            foreach ($search_provinces->childs as $key => $value) {
                $provinces .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }
        // REGION
        $search_regions = Lc_region::where('id', $request->provinceID)->first();
        if ($search_regions != null) {
            foreach ($search_regions->childs as $key => $value) {
                $regions .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }
        // CITY
        $search_cities = Lc_region::where('id', $request->regionID)->first();
        if ($search_cities != null) {
            foreach ($search_cities->childs as $key => $value) {
                $cities .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }
        // NEIGHBOUR
        $search_neighbours = Lc_region::where('id', $request->cityID)->first();
        if ($search_neighbours != null) {
            foreach ($search_neighbours->childs as $key => $value) {
                $neighbours .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }
        $data_html = [
            'countries' => $countries,
            'provinces' => $provinces,
            'regions' => $regions,
            'cities' => $cities,
            'neighbours' => $neighbours
        ];
        return $data_html;
    }
}
