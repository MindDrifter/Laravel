<?php

namespace App\Http\Controllers;
use App\Models\UserCards;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\CreateCardRequest;

class UserCardsController extends Controller{

    public function loadUserCards(){
        if (Cookie::has('email')){
            $cards = new UserCards();
            $id = Cookie::get('id');


            $myTheme = $cards ->where('userId', $id) ->pluck('theme');
            $myTitle = $cards ->where('userId', $id) ->pluck('title');
            $myBody = $cards ->where('userId',$id) ->pluck('body');
            $myCardId = $cards ->where('userId', $id) ->pluck ('id');


            $myCards = array();
            for ($i = 0; $i < count($myTheme); $i++){
                array_push($myCards, array($myTitle[$i],$myBody[$i], $myTheme[$i]));
            }
            return view('user_cards', ['myCards' => $myCards,
                                            'myCardId' => $myCardId]);

        }else{
            return redirect(route('home'))->with('failed', 'Вы не вошли');
        }

    }

    public function deleteCard($id){
        $card = UserCards::find($id);
        $card->delete();

        return redirect(route('user_cards'))->with('success', 'Карта удалена');
    }

    public function createCard(CreateCardRequest $createCardRequest){
        $card = new UserCards();
        $card->theme = $createCardRequest->input('theme');
        $card->title = $createCardRequest->input('title');
        $card->body = $createCardRequest->input('body');
        $card ->userId =Cookie::get('id');
        $card->save();
        return redirect()->route('user_cards');

    }
}
