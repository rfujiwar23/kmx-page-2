<?php global $title; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/favicon/favicon.ico">
  <title><?php 
    echo get_bloginfo('name');
    if(!is_home()) echo ' | ' . $title;
  ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/index.css?1">
  <?php wp_head(); ?>
</head>

<body>
  <div class="wrapper">

    <!-- 下にログイン・登録のボタンを表示 -->
    <div class="log-in-button">
      <a href="/login">
        <div class="login button-area">
          ログインページへ
        </div>
      </a>
      <a href="/login">
        <div class="register button-area">
          登録ページへ
        </div>
      </a>
    </div>

    <!-- ヘッダー固定でスクロールしてもついてくる -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/curriculum/"><img src="<?php echo get_template_directory_uri(); ?>/images/kmax-logo@2x.png" alt="" height="20"></a>

        </div>
      </nav>
      <div class="navbar-bottom">
        <div class="container">
          <div class="row">
            <div class="navbar-bottom-contents col-4 d-flex justify-content-center align-items-center">
              <a href="/login"><span>ログイン</span><br><i class="fa-solid fa-right-to-bracket"></i></a>
            </div>
            <div class="navbar-bottom-contents col-4 d-flex justify-content-center align-items-center">
              <a href="/curriculum/course/"><span>コース一覧</span><br><i class="fa-solid fa-list"></i></a>
            </div>
            <div class="navbar-bottom-contents col-4 d-flex justify-content-center align-items-center">
              <a href="/curriculum/seminar/"><span>ゼミ一覧</span><br><i class="fa-solid fa-table-list"></i></a>
            </div>
          </div>
        </div>
      </div>
    </header>