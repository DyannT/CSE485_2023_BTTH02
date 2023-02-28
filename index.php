<?php
    //Routing: định tuyến
    //Phân tích URL của ng dùng đang Request ? Tìm xem: Ai sẽ xử lý tiếp(Controller nào)

    //Tình huống 01: localhost/btth02/index.php
    //Tình huống 02: localhost/btth02/index.php?controller=A&action=B
    //localhost/btth02/index.php?controller=home&action=index
    //localhost/btth02/index.php?controller=acticle&action=add

    //B1: Kiểm tra giá trị của hôm và controller
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    //B2:Đổi chữ đầu tiên sag in hoa để phù hợp với tệp tin -> tìm tệp và chuyển quyền sang
    $controller = ucfirst($controller).'Controller';

    $controllerPath = 'controllers/'.$controller.'.php';

    if(!file_exists($controllerPath)){
        die('Tệp k tồn tại');
    }

    // Nếu có tồn tại thì require vô
    require($controllerPath);
    //Khởi tại đối tượng tương ứng và gọi hàm xử lý action
    $myObj = new $controller();
    $myObj->index();
    echo '<br/>';
    // $myObj->$action();

