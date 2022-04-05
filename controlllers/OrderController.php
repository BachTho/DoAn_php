<?php
require_once('models/Category.php');
require_once('controlllers/BaseController.php');
require_once('models/Product.php');
require_once('models/Order.php');
require_once('models/OrderDetail.php');
require_once('controlllers/AdminController.php');
class OrderController extends AdminController
{
    public function index()
    {
        $OrderModel = new Order();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        switch ($action) {
            case 1:
                $ListOrder = $OrderModel->findOrderByStatusProcessing();
                break;
            case 2:
                $ListOrder = $OrderModel->findOrderByStatusProcessed();
                break;
            case 3:
                $ListOrder = $OrderModel->findOrderByStatusDelivering();
                break;
            case 4:
                $ListOrder = $OrderModel->findOrderByStatusComplete();
                break;
        }
        if (isset($ListOrder)) {
            for ($i = 0; $i < sizeof($ListOrder); $i++) {
                if ($ListOrder[$i]['status'] == 0) {
                    $ListOrder[$i]['status'] = 'Đang chờ duyệt';
                }
                if ($ListOrder[$i]['status'] == 1) {
                    $ListOrder[$i]['status'] = 'Đã duyệt';
                }
                if ($ListOrder[$i]['status'] == 2) {
                    $ListOrder[$i]['status'] = 'Đang giao hàng';
                }
                if ($ListOrder[$i]['status'] == 3) {
                    $ListOrder[$i]['status'] = 'Giao thành công';
                }
            }
        }
        require_once('Views/orders/list.php');
    }

    public function orderDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $OrderModel = new Order();
        $Order = $OrderModel->find($id);
        $OrderDetailModel = new OrderDetail();
        $ListOrderDetails = $OrderDetailModel->getOrderDetailbyid($id);
        // 	echo "<pre>";
        // print_r($ListOrderDetails);
        // echo "</pre>";
        // die();
        require_once('Views/orders/detail.php');
    }

    public function update()
    {
        $OrderModel = new Order();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $Order = $OrderModel->find($id);
            if ($Order['status'] == 0) {
                $Order['status'] = 1;
            } else if ($Order['status'] == 1) {
                $Order['status'] = 2;
            }
        }

        $update = $OrderModel->update($Order);
        if ($update) {
            setcookie('update', 'Cập nhật thành công', time() + 1);
        }
        $this->redirect('index.php?mod=order&act=index&action=1');
    }
}
