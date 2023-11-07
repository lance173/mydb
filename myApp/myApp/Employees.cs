using System;
using System.Windows.Forms;

namespace myApp
{
    public partial class Employees : Form
    {
        public Employees()
        {
            InitializeComponent();
        }

        public static string CompanyID = null;
        public static string ScreenName = null;
        public static string ShiftStart = null;
        public static string ShiftEnd = null;

        public void Disp()
        {
            dataGridView2.DataSource = mysql.GetData($"select CompanyID, ScreenName, ShiftStart, ShiftEnd from employees");
            //dataGridView2.DataSource = mysql.GetData($"select * from employees");
            dataGridView2.ClearSelection();
        }

        private void Employees_Load(object sender, EventArgs e)
        {
            Disp();
        }

        private void dataGridView2_SelectionChanged(object sender, EventArgs e)
        {
            CompanyID = Convert.ToString(dataGridView2.CurrentRow.Cells[0].Value);
            ScreenName = Convert.ToString(dataGridView2.CurrentRow.Cells[1].Value);
            ShiftStart = Convert.ToString(dataGridView2.CurrentRow.Cells[2].Value);
            ShiftEnd = Convert.ToString(dataGridView2.CurrentRow.Cells[3].Value);
        }


    }
}
