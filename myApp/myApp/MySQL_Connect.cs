using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace myApp
{
    public partial class MySQL_Connect : Form
    {
        public MySQL_Connect()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string connectionString = null;
            MySqlConnection cnn;
            connectionString = "server=localhost;database=mydb;uid=root;pwd=\"\";";
            cnn = new MySqlConnection(connectionString);
            try
            {
                cnn.Open();
                MessageBox.Show("Connection Open!");
                cnn.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Can not open connection!");
            }
        }
    }
}
