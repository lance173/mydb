using System;
using System.Windows.Forms;

namespace myApp
{
    public partial class AddEdit : Form
    {
        public AddEdit(string title)
        {
            InitializeComponent();
            lbl_Title.Text = title;
        }

        public static string id = null;

        private void AddEdit_Load(object sender, EventArgs e)
        {
            ((Customers)Application.OpenForms["Customer"]).Enabled = false;   

            switch (lbl_Title.Text) 
            {
                case "Add Customer":

                    break;

                case "Update Customer":
                    button1.Text = "Update";
                    id = Customers.id;
                    txt_Firstname.Text = Customers.first_name;
                    txt_Lastname.Text = Customers.last_name;
                    txt_Address.Text = Customers.home_address;
                    txt_Contact.Text = Customers.contact_number;

                    break;
                
            }
        }

        private void AddEdit_FormClosed(object sender, FormClosedEventArgs e)
        {
            ((Customers)Application.OpenForms["Customer"]).Enabled = true;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                switch(lbl_Title.Text) 
                {
                    case "Add Customer":
                        mysql.Query($"insert into customer(first_name,last_name,home_address,contact_number) values('{txt_Firstname.Text}','{txt_Lastname.Text}','{txt_Address.Text}','{txt_Contact.Text}')");
                        break;

                    case "Update Customer":
                        mysql.Query($"update customer set first_name='{txt_Firstname.Text}',last_name='{txt_Lastname.Text}',home_address='{txt_Address.Text}',contact_number='{txt_Contact.Text}' where id='{id}'");
                        break;
                }
                ((Customers)Application.OpenForms["Customer"]).Disp();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}
