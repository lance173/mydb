using System;
using System.Windows.Forms;

namespace myApp
{
    public partial class Customer : Form
    {
        public Customer()
        {
            InitializeComponent();
        }

        public static string id = null;
        public static string first_name = null;
        public static string last_name = null;
        public static string home_address = null;
        public static string contact_number = null;

        public void Disp()
        {
            dataGridView1.DataSource = mysql.GetData($"select * from customer");
            dataGridView1.ClearSelection();
        }

        private void Customer_Load(object sender, EventArgs e)
        {
            Disp();
        }

        private void btnAction_Click(object sender, EventArgs e)
        {
            Button btnText = (Button)sender;    
            switch(btnText.Text) 
            {
                case "New":
                    new AddEdit("Add Customer").Show();
                    break;

                case "Edit":
                    if (dataGridView1.SelectedRows.Count == 0)
                    {
                        MessageBox.Show("NO record selected");
                    }
                    else
                    {
                        new AddEdit("Update Customer").Show();
                    }
                    break;

                case "Delete":
                    if (dataGridView1.SelectedRows.Count == 0)
                    {
                        MessageBox.Show("NO record selected");
                    }
                    else
                    {
                        try
                        {
                            DialogResult dr = MessageBox.Show("Delete selected record?", "Confirmation", MessageBoxButtons.YesNo);
                            if(dr == DialogResult.Yes)
                            {
                                mysql.Query($"delete from customer where id='{id}'");
                                Disp();
                                MessageBox.Show("Record deleted successfully.");
                            }
                        }
                        catch (Exception ex)
                        {
                            MessageBox.Show(ex.Message);
                        }
                    }
                    break;

                case "Refresh":
                    Disp();
                    break;

                case "Print":

                    break;

                case "Search":
                    dataGridView1.DataSource = mysql.GetData($"select * from customer where first_name like '%{textBox1.Text}%' or last_name like '%{textBox1.Text}%' or home_address like '%{textBox1.Text}%' or contact_number like '%{textBox1.Text}%'");
                    break;
            }
        }

        private void dataGridView1_SelectionChanged(object sender, EventArgs e)
        {
            id = Convert.ToString(dataGridView1.CurrentRow.Cells[0].Value);
            first_name = Convert.ToString(dataGridView1.CurrentRow.Cells[1].Value);
            last_name = Convert.ToString(dataGridView1.CurrentRow.Cells[2].Value);
            home_address = Convert.ToString(dataGridView1.CurrentRow.Cells[3].Value);
            contact_number = Convert.ToString(dataGridView1.CurrentRow.Cells[4].Value);
        }

    }
}
