document.addEventListener("DOMContentLoaded", function () {
    //  1. Slider ảnh tự động
    const images = [
        "./asset/img/img1.png",
        "./asset/img/img2.png"
    ];
    let currentIndex = 0;
    const slideImg = document.getElementById("slide");
    if (slideImg) {
        setInterval(() => {
            currentIndex = (currentIndex + 1) % images.length;
            slideImg.src = images[currentIndex];
        }, 2500);
    }
    //  2. Click “Đặt lịch ngay”
    document.querySelectorAll(".box-doctor .booking-now").forEach(button => {
        button.addEventListener("click", function () {
            const box = this.closest(".box-doctor");

            //  Lấy dữ liệu từ data-* attributes
            const tenBS = box.dataset.bacsi;
            const maCK = box.dataset.mack;

            //  Gán tên bác sĩ vào form
            const bacsiSelect = document.getElementById("bacsi");
            bacsiSelect.innerHTML = "<option selected>" + tenBS + "</option>";

            //  Gán chuyên khoa vào form
            const chuyenkhoaSelect = document.getElementById("chuyenkhoa");
            chuyenkhoaSelect.value = maCK;

            //  Gọi AJAX để load dịch vụ theo chuyên khoa
            fetch("./admin/ajax/ajax_load.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "machuyenkhoa=" + encodeURIComponent(maCK)
            })
                .then(response => {
                    if (!response.ok) throw new Error("Lỗi kết nối đến máy chủ");
                    return response.json();
                })
                .then(data => {
                    const dichvuSelect = document.getElementById("dichvu");
                    dichvuSelect.innerHTML = "<option value=''></option>";
                    data.dichvu.forEach(dv => {
                        const option = document.createElement("option");
                        option.value = dv.iddichvu || ""; // nếu có id
                        option.text = dv.tendichvu;
                        dichvuSelect.add(option);
                    });
                })
                .catch(error => {
                    console.error("Lỗi khi tải dịch vụ:", error);
                    alert("Không thể tải danh sách dịch vụ. Vui lòng thử lại sau.");
                });

            //  Cuộn xuống form đặt lịch
            document.getElementById("form-dk").scrollIntoView({
                behavior: "smooth"
            });
        });
    });

    //  3. Thay đổi chuyên khoa → load bác sĩ & dịch vụ
    const chuyenkhoaSelect = document.getElementById("chuyenkhoa");
    chuyenkhoaSelect?.addEventListener("change", function () {
        const machuyenkhoa = this.value;

        fetch("./admin/ajax/ajax_load.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "machuyenkhoa=" + encodeURIComponent(machuyenkhoa)
        })
            .then(response => {
                if (!response.ok) throw new Error("Lỗi kết nối");
                return response.json();
            })
            .then(data => {
                const bacsiSelect = document.getElementById("bacsi");
                const dichvuSelect = document.getElementById("dichvu");

                bacsiSelect.innerHTML = "<option value=''></option>";
                dichvuSelect.innerHTML = "<option value=''></option>";

                data.bacsi.forEach(bs => {
                    const option = document.createElement("option");
                    option.text = bs.tenbacsi;
                    bacsiSelect.add(option);
                });

                data.dichvu.forEach(dv => {
                    const option = document.createElement("option");
                    option.value = dv.iddichvu || "";
                    option.text = dv.tendichvu;
                    dichvuSelect.add(option);
                });
            })
            .catch(error => {
                console.error("Lỗi khi tải dữ liệu:", error);
                alert("Không thể tải dữ liệu. Vui lòng thử lại.");
            });
    });
});