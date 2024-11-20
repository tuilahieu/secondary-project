# SECONDARY PROJECT

FIRST TEST GITHUB

code vẽ UML

@startuml
start

label nhập_lại

:Truy cập trang quản lý;
:Hệ thống hiển thị trang quản lý;
:Chọn thêm mới các thông tin;
:Hệ thống xác thực và chuyển hướng;
:Nhấn nút thêm mới để thêm dữ liệu;
:Hệ thống hiển thị trang thêm mới;
:Người quản lý điền dữ liệu mới;
if (dữ liệu hợp lí) then (Hợp lệ)
  :Hệ thống xử lí thành công và lưu trữ vào CSDL;
else (Không hợp lệ)
 :Thông báo lỗi;
 -> nhập_lại;

stop
@enduml

@startuml
actor Người_Quản_Lý
participant "Giao diện" as TrangQuanLy
participant "Hệ Thống" as HeThong
database "CSDL" as CSDL

Người_Quản_Lý -> TrangQuanLy : Truy cập trang quản lý
TrangQuanLy -> HeThong : Hiển thị trang quản lý

Người_Quản_Lý -> HeThong : Chọn thêm mới các thông tin
HeThong -> HeThong : Xác thực và chuyển hướng
HeThong -> TrangQuanLy : Hiển thị trang thêm mới

Người_Quản_Lý -> TrangQuanLy : Nhấn nút thêm mới để thêm dữ liệu
TrangQuanLy -> HeThong : Gửi dữ liệu mới

alt Dữ liệu hợp lệ
    HeThong -> CSDL : Lưu trữ dữ liệu vào CSDL
    HeThong -> Người_Quản_Lý : Xử lí thành công
else Dữ liệu không hợp lệ
    HeThong -> Người_Quản_Lý : Thông báo lỗi
    Người_Quản_Lý -> TrangQuanLy : Nhập lại dữ liệu
    TrangQuanLy -> HeThong : Gửi lại dữ liệu mới
end

@enduml



@startuml
start

:Truy cập trang quản lý;
:Hệ thống hiển thị trang quản lý;
:Chọn sửa các thông tin;
:Hệ thống xác thực và chuyển hướng;
:Nhấn icon sửa để thêm dữ liệu;
:Hệ thống hiển thị trang sửa;
:Người quản lý điền dữ liệu cần sữa;

if (Dữ liệu hợp lí?) then (Hợp lệ)
  :Hệ thống xử lí thành công và lưu trữ vào CSDL;
else (Không hợp lệ)
  :Thông báo lỗi;
  --> Hệ thống hiển thị lại trang sửa;
endif

stop
@enduml
