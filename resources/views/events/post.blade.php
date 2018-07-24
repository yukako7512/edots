<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Share</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="{{ secure_asset('css/post.css') }}">
    </head>
    <body>
        @include('commons.navbar')

        <div class ="cover">
            <div class = "cover-contents">
                    <h1>体験をPOSTしよう。</h1>
                    <br>
                    <p>以下の項目にご記入の上、<br>
                    POSTボタンを押してください。</p>
    
        @if ($errors->any())
               <div class="errors">
                 <ul>
            @foreach ($errors->all() as $error)
                     <div class="error-message"><li>{{ $error }}</li></div>
            @endforeach
                 </ul>
               </div>
        @endif      
        
                <div id = "form">
                    {!! Form::model($event,['route' => 'post.post']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text('title','', array('rows'=>'3','class'=>'span6','placeholder'=>'例）スキューバダイビング体験')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'カテゴリー') !!}    
                    {!! Form::select('category', ['Sports'=>'Sports', 'Arts'=>'Arts', 'Beauty'=>'Beauty','Nature'=>'Nature','Food'=>'Food','Technology'=>'Technology','Language'=>'Language','Others'=>'Others']) !!} 
                <!--{!! Form::text('category') !!}-->
                </div>
                <div class="form-group">    
                    {!! Form::label('date', '日時') !!}
                    {!! Form::text('date','yyyy/mm/dd --:--') !!}
                    <p>例）2018/07/27 10:00</p>
                </div>
                <div class="form-group">    
                    {!! Form::label('place', '場所') !!}
                    {!! Form::text('place','', array('rows'=>'3','class'=>'span6','placeholder'=>'例）二子玉川駅')) !!}
                </div>
                
                <div class="form-group">    
                    {!! Form::label('point', 'ポイント') !!}
                    {!! Form::select('point', ['100'=>'100', '200'=>'200', '300'=>'300','400'=>'400','500'=>'500']) !!}
                </div>
                
                <div class="form-group">    
                    {!! Form::label('max_capacity', '定員') !!}
                    {!! Form::text('max_capacity','', array('placeholder'=>'例）10')) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '内容') !!}
                    {!! Form::textarea('content','', array('placeholder'=>'例）二子玉川駅に集合して、いっしょにスキューバダイビングをしに行きましょう。水着とタオルの持参をお忘れなく！')) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::submit('投稿する',  ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>


    
    
    <!--<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@riccardoch?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Riccardo Chiarini"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Riccardo Chiarini</span></a>-->
    </body>  