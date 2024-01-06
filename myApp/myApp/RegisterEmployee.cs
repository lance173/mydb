using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.Design;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Futronic.SDKHelper;

namespace myApp
{
    public partial class RegisterEmployee : Form
    {
        public RegisterEmployee()
        {
            InitializeComponent();
        }

        public class Employee
        {
            public int CompanyID { get; set; }
            public string ScreenName { get; set; }

            public string DisplayText => $"{CompanyID}  -  {ScreenName}";
        }

        private void RegisterEmployee_Load(object sender, EventArgs e)
        {
            DataTable dataTable = mysql.GetData("SELECT * FROM employees WHERE FPRegistered = 'No'");

            List<Employee> employees = new List<Employee>();

            foreach (DataRow row in dataTable.Rows)
            {
                employees.Add(new Employee
                {
                    CompanyID = Convert.ToInt32(row["CompanyID"]),
                    ScreenName = Convert.ToString(row["ScreenName"])
                });
            }
            EmployeeListbox.DataSource = employees;
            EmployeeListbox.DisplayMember = "DisplayText";
            EmployeeListbox.ValueMember = "CompanyID";
        }





    }
}
