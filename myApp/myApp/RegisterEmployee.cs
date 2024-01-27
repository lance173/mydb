using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.Design;
using System.Data;
using System.Drawing;
using System.IO;
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

            public string PhotoPath { get; set; }

        }

        private void RegisterEmployee_Load(object sender, EventArgs e)
        {
          //this.EmployeeListbox.Items.Clear();
            
            DataTable dataTable = mysql.GetData("SELECT * FROM employees WHERE FPRegistered = 'No'");

            List<Employee> employees = new List<Employee>();

            foreach (DataRow row in dataTable.Rows)
            {
                //EmployeeListbox.Text = "-- SELECT EMPLOYEE --"; 
                employees.Add(new Employee
                {
                    CompanyID = Convert.ToInt32(row["CompanyID"]),
                    ScreenName = Convert.ToString(row["ScreenName"]),
                    PhotoPath = Convert.ToString(row["Photo"])
                });
            }
            EmployeeListbox.DataSource = employees;
            EmployeeListbox.DisplayMember = "DisplayText";
            EmployeeListbox.ValueMember = "CompanyID";

            Console.WriteLine($"Working Directory: {Environment.CurrentDirectory}");
        }

        private void EmployeeListbox_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (EmployeeListbox.SelectedItem != null)
            {
                Employee selectedEmployee = (Employee)EmployeeListbox.SelectedItem;

                // Assuming regEmpPictureBox is the name of your PictureBox
                string imagePath = Path.Combine("../../../../", selectedEmployee.PhotoPath);
                regEmpPictureBox.Image = Image.FromFile(imagePath);

            }
        }
    }
}
