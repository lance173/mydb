using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Futronic.SDKHelper;

namespace myApp
{
    public partial class InputTime : Form
    {
        public InputTime()
        {
            InitializeComponent();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            clockLabel.Text = DateTime.Now.ToString("HH:mm:ss");
            dateLabel.Text = DateTime.Now.ToString("dddd, MMMM dd yyyy");
        }

        private void InputTime_Load(object sender, EventArgs e)
        {
            timer1.Start();

        }

        private void RegEmpBtn_Click(object sender, EventArgs e)
        {
            new RegisterEmployee().Show();
        }

        private void TimeButton_Click(object sender, EventArgs e)
        {

        }
    }
}
