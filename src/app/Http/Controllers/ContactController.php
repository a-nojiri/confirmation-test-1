<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // カテゴリ一覧を取得
        return view('contact.index', compact('categories')); // ビューに渡す     
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'email' => ['required', 'email'],
            'tel' => ['required', 'digits:5'], // 5桁の数字のみ
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string', 'max:120'],
        ], [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.digits' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'category_id.exists' => '正しいお問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
            'content.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ]);
        
        $category = Category::find($validated['category_id']);
        $validated['category_name'] = $category ? $category->name : '';
        return view('contact.confirm', ['contact' => $validated]);
    }

    public function send(Request $request)
    {
        // バリデーション済みデータ取得
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building_name',
            'category_id',
            'content',
        ]);

        // データベース保存
        Contact::create($contact);

        // サンクスページへリダイレクト
        return redirect('/thanks');
    }

    //  戻る処理
    public function back(Request $request)
    {
        return redirect('/')
            ->withInput();
    }
}
