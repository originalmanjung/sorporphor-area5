
function approveData(id){
    Swal.fire({
        title: 'คุณต้องการรับเรื่องนี้หรือไม่?',
        text: "เมื่องรับเรื่องแล้วจะไม่สามารถแก้ไขได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยอมรับ!'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'กำลังเพิ่มข้อมูล',
                html: 'กรุณารอสักครู่.',
                    didOpen: () => {
                        Swal.showLoading()
                        document.getElementById('approve-form-' + id).submit();
                    },
                }).then((result) => {
                    Swal.close()
                });
        }
    })
}

function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}

const showLoading = function(text,id) {
    Swal.fire({
    title: text,
    html: 'กรุณารอสักครู่.',
    // timer: 1000,
        didOpen: () => {
            Swal.showLoading()
            document.getElementById(id).submit();
        },
    }).then((result) => {
        Swal.close()
    });
}
