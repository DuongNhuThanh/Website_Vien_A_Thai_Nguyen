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
                        option.value = dv.tendichvu || ""; // nếu có id
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
                    option.value = dv.tendichvu;
                    option.text = dv.tendichvu;
                    dichvuSelect.add(option);
                });
            })
            .catch(error => {
                console.error("Lỗi khi tải dữ liệu:", error);
                alert("Không thể tải dữ liệu. Vui lòng thử lại.");
            });
    });

    const btnSelectCK = document.getElementById("button-select-ck");
    const popupCK = document.getElementById("popup-ck");
    const closeBtn = document.querySelector(".close-btn");

    btnSelectCK?.addEventListener("click", () => {
        popupCK?.classList.remove("hidden");
    });

    // 5. Đóng popup khi click dấu X
    closeBtn?.addEventListener("click", () => {
        popupCK?.classList.add("hidden");
    });

    // 6. Tìm kiếm chuyên khoa theo tên
    const searchInput = document.getElementById("search-ck");
    searchInput?.addEventListener("input", function () {
        const keyword = this.value.toLowerCase();
        const items = document.querySelectorAll(".khoa_item");

        items.forEach(item => {
            const name = item.getAttribute("data-name")?.toLowerCase() || "";
            item.style.display = name.includes(keyword) ? "block" : "none";
        });
    });
    // 7. Click vào chuyên khoa → load bác sĩ theo mã chuyên khoa
    document.querySelectorAll(".khoa_item").forEach(item => {
        item.addEventListener("click", function () {
            const machuyenkhoa = this.dataset.mack;
            console.log("Mã chuyên khoa gửi đi:", machuyenkhoa);

            fetch("../../admin/ajax/ajax_load_bs.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "machuyenkhoa=" + encodeURIComponent(machuyenkhoa)
            })
                .then(response => {
                    if (!response.ok) throw new Error("Lỗi kết nối");
                    return response.json();
                })
                .then(data => {
                    const doctorList = document.getElementById("doctor-list");
                    doctorList.innerHTML = ""; // Xóa danh sách cũ

                    if (!data.bacsi || data.bacsi.length === 0) {
                        doctorList.innerHTML = "<p>Không tìm thấy bác sĩ cho chuyên khoa này.</p>";
                        return;
                    }

                    data.bacsi.forEach(bs => {
                        const div = document.createElement("div");
                        div.className = "box-doctor";
                        const imgHTML = bs.avartar
                            ? `<img src="data:image/jpeg;base64,${bs.avartar}" alt="Ảnh bác sĩ">`
                            : `<img src="default-icon.png" alt="Ảnh mặc định">`;
                        div.innerHTML = `
                        <div class="img-doc">${imgHTML}</div>
                        <div class="name-doc">${bs.tenbacsi}</div>
                        <div class="chucvi-doc">${bs.chucvi}</div>
                        <div class="booking-now">
                            <h4><a href="#">Đặt lịch ngay</a></h4>
                            <div class="ti-arrow-right"></div>
                        </div>
                    `;
                        doctorList.appendChild(div);
                        popupCK?.classList.add("hidden");
                    });
                })
                .catch(error => {
                    const errorMessage = `Lỗi khi tải bác sĩ: ${error.message || error}`;
                    console.error(errorMessage);

                    // Hiển thị lỗi ra giao diện
                    const errorBox = document.getElementById("error-message");
                    if (errorBox) {
                        errorBox.textContent = errorMessage;
                        errorBox.classList.remove("hidden");
                    } else {
                        alert(errorMessage); // fallback nếu không có vùng hiển thị
                    }
                });

        });
    });
});