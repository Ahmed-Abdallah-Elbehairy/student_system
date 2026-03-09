let name = document.getElementById('name');
let age = document.getElementById('age');
let sub1 = document.getElementById('sub1');
let sub2 = document.getElementById('sub2');
let sub3 = document.getElementById('sub3');
let sub4 = document.getElementById('sub4');
let sub5 = document.getElementById('sub5');
let sub6 = document.getElementById('sub6');
let submit = document.getElementById('submit');
let downloadBtn = document.getElementById('ex');

let mood = "create";
let updateId = null;

loadData();


submit.addEventListener('click', async function(e) {
    e.preventDefault();


    if (
        name.value.trim() === "" ||
        age.value.trim() === "" ||
        sub1.value.trim() === "" ||
        sub2.value.trim() === "" ||
        sub3.value.trim() === "" ||
        sub4.value.trim() === "" ||
        sub5.value.trim() === "" ||
        sub6.value.trim() === ""
    ) {
        alert("⚠️ من فضلك املأ جميع الحقول قبل الإضافة");
        return;
    }

    let formData = new FormData();
    formData.append("name", name.value);
    formData.append("age", age.value);
    formData.append("WEP", sub1.value);
    formData.append("Data", sub2.value);
    formData.append("System", sub3.value);
    formData.append("MICRO", sub4.value);
    formData.append("OR", sub5.value);
    formData.append("Discrete", sub6.value);

    if (mood === "create") {
        let response = await fetch("insert.php", { method: "POST", body: formData });
        let result = await response.text();

        if (result === "success") {
            clearData();
            loadData();
        } else {
            alert("❌ Error inserting data");
        }
    } else {
        formData.append("id", updateId);
        let response = await fetch("update.php", { method: "POST", body: formData });
        let result = await response.text();

        if (result === "success") {
            clearData();
            loadData();
            mood = "create";
            submit.innerHTML = "Add Student";
        } else {
            alert("❌ Error updating data");
        }
    }
});


function clearData() {
    name.value = "";
    age.value = "";
    sub1.value = "";
    sub2.value = "";
    sub3.value = "";
    sub4.value = "";
    sub5.value = "";
    sub6.value = "";
}


async function loadData() {
    let response = await fetch("get.php");
    let data = await response.json();

    let table = "";
    data.forEach((s) => {
        table += `
        <tr>
            <td>${s.name}</td>
            <td>${s.age}</td>
            <td>${s.wep}</td>
            <td>${s.data}</td>
            <td>${s.system}</td>
            <td>${s.micro}</td>
            <td>${s.orr}</td>
            <td>${s.discrete}</td>

            <td>
                <button type="button" 
                    onclick="updateData(${s.id}, '${s.name}', ${s.age}, ${s.wep}, ${s.data}, ${s.system}, ${s.micro}, ${s.orr}, ${s.discrete})">
                    Update
                </button>
            </td>

            <td>
                <button type="button" onclick="deleteData(${s.id})">Delete</button>
            </td>
        </tr>
        `;
    });

    document.getElementById("tbody").innerHTML = table;
}


async function deleteData(id) {
    let formData = new FormData();
    formData.append("id", id);

    await fetch("delete.php", { method: "POST", body: formData });
    loadData();
}

function updateData(id, n, a, w, d, sy, mi, o, dis) {
    name.value = n;
    age.value = a;
    sub1.value = w;
    sub2.value = d;
    sub3.value = sy;
    sub4.value = mi;
    sub5.value = o;
    sub6.value = dis;

    mood = "update";
    updateId = id;
    submit.innerHTML = "Update Student";

    scroll({ top: 0, behavior: "smooth" });
}

downloadBtn.addEventListener("click", async function() {
    let response = await fetch("get.php");
    let data = await response.json();

    if (!data.length) {
        alert("⚠️ لا توجد بيانات للتصدير!");
        return;
    }

    const excelData = data.map((s, i) => {
  
        const total = [s.wep, s.data, s.system, s.micro, s.orr, s.discrete]
                        .map(Number)
                        .reduce((a,b) => a+b, 0);
        const average = (total / 6).toFixed(2);

        return {
            "#": i + 1,
            "Name": s.name,
            "Age": s.age,
            "WEP": s.wep,
            "Data": s.data,
            "System": s.system,
            "MICRO": s.micro,
            "OR": s.orr,
            "Discrete": s.discrete,
            "Total": total,
            "Average": average
        };
    });

    const worksheet = XLSX.utils.json_to_sheet(excelData);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Students");
    XLSX.writeFile(workbook, "Students_Report.xlsx");
});
