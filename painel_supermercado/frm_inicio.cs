using MetroSet_UI.Forms;
using System;
using System.Data;
using System.Text.RegularExpressions;
using System.Windows.Forms;

namespace painel_supermercado
{
    public partial class frm_inicio : MetroSetForm
    {
        public frm_inicio()
        {
            InitializeComponent();
        }

        private void frm_inicio_Load(object sender, EventArgs e)
        {
            pnl_prod.Visible = true;
            pnl_funcianrio.Visible = false;
            Listar(); //lista os produtos quando o programa abre
            Listar2();
        }

        private void btn_produtos_Click(object sender, EventArgs e)
        {
            pnl_prod.Visible = true;
            pnl_funcianrio.Visible = false;
        }
        private void btn_funcionario_Click(object sender, EventArgs e)
        {
            pnl_funcianrio.Visible = true;
            //pnl_prod.Visible = false;
            Listar2();
        }
        //criação de variáveis
        ConexaoBD bd = new ConexaoBD(); //chama a conexão do bd
        string sql, foto;
        DateTime datafab, datavenc;

        public void Limpar() //criacao do metodo de limpeza dos campos
        {
            txt_lote.Clear();
            txt_codbarras.Clear();
            txt_nome.Clear();
            txt_preco.Clear();
            nmr_quant.Value = 0;
            dtp_dtfabr.Text = DateTime.Now.ToString(); //seleciona a data do dia
            dtp_dtvenc.Text = DateTime.Now.ToString();
            cbx_categoria.SelectedIndex = -1;
            //img_prod.Load("H:/trabalho_interdiciplinar/img/sem_produto.png"); //carregar a imagem | troque "\" por "/"
        }

        public void Listar() //coloca as informações no painel
        {
            sql = "select * from produtos"; //comando pro bd
            dgv_data.DataSource = bd.ConsultarTabelas(sql); //executa o comando no bd e pega as informações
            img_prod.Load("C:/Users/rodri/Documents/escola/trabalho_interdiciplinar/img/sem_produto.png");
        }




        private void btn_novo_Click_1(object sender, EventArgs e) //cria um novo produto no bd
        {
            string categoria = cbx_categoria.Text; //cria uma variável para o cbx
            int catselect = 0; //numero selecionado da foreign key categoria no bd

            switch (categoria)
            { // switch case para definir o nmr da variavel para a foreign key
                case "BEBIDAS":
                    catselect = 1;
                    break;
                case "FRIOS":
                    catselect = 2;
                    break;
                case "ALIMENTOS":
                    catselect = 3;
                    break;
                case "BEBIDAS DE CAFE":
                    catselect = 4;
                    break;
                case "CAFE":
                    catselect = 5;
                    break;
                case "CARNES":
                    catselect = 6;
                    break;
                case "CHOCOLATE":
                    catselect = 7;
                    break;
                case "DIVERSOS":
                    catselect = 8;
                    break;
                case "EMBUTIDOS":
                    catselect = 9;
                    break;
                case "ENCOMENDAS":
                    catselect = 10;
                    break;
                case "HORTI-FRUTI":
                    catselect = 11;
                    break;
                case "INSUMOS DIRETOS":
                    catselect = 12;
                    break;
                case "LATICINIOS":
                    catselect = 13;
                    break;
                case "MATERIAL DE LIMPEZA":
                    catselect = 14;
                    break;
                case "OUTRAS BEBIDAS":
                    catselect = 15;
                    break;
                case "PATISSERIE":
                    catselect = 16;
                    break;
                case "PETITS-FOURS":
                    catselect = 17;
                    break;
                case "PROCESSADOS":
                    catselect = 18;
                    break;
                case "SECOS":
                    catselect = 19;
                    break;
                case "UTENSILIOS":
                    catselect = 20;
                    break;
                case "VIENNOISERIE":
                    catselect = 21;
                    break;
            }

            datafab = DateTime.Parse(dtp_dtfabr.Text); //formata a data
            datavenc = DateTime.Parse(dtp_dtvenc.Text);

            foto = foto.Replace(@"\", @"\\"); //formata o caminho da foto

            sql = string.Format("insert into produtos values(null, '{0}', '{1}', '{2}', '{3}', '{4}', '{5}', '{6}','{7}', '{8}')" //código que vai ser executado no bd
                , txt_nome.Text, txt_codbarras.Text, datafab.ToString("yyyy-MM-dd"), datavenc.ToString("yyyy-MM-dd")
                , txt_lote.Text, nmr_quant.Value, txt_preco.Text, foto, catselect); //campos que vão para o bd
            bd.AlterarTabelas(sql);
            Limpar();
            Listar();

            MessageBox.Show("O novo produto foi adicionado com sucesso!", "Produto cadastrado!", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void btn_alterar_Click(object sender, EventArgs e) //faz a alteração de elementos no bd
        {
            string categoria = cbx_categoria.Text; //cria uma variável para o cbx
            int catselect = 0; //numero selecionado da foreign key categoria no bd

            switch (categoria)
            { // switch case para definir o nmr da variavel para a foreign key
                case "BEBIDAS":
                    catselect = 1;
                    break;
                case "FRIOS":
                    catselect = 2;
                    break;
                case "ALIMENTOS":
                    catselect = 3;
                    break;
                case "BEBIDAS DE CAFE":
                    catselect = 4;
                    break;
                case "CAFE":
                    catselect = 5;
                    break;
                case "CARNES":
                    catselect = 6;
                    break;
                case "CHOCOLATE":
                    catselect = 7;
                    break;
                case "DIVERSOS":
                    catselect = 8;
                    break;
                case "EMBUTIDOS":
                    catselect = 9;
                    break;
                case "ENCOMENDAS":
                    catselect = 10;
                    break;
                case "HORTI-FRUTI":
                    catselect = 11;
                    break;
                case "INSUMOS DIRETOS":
                    catselect = 12;
                    break;
                case "LATICINIOS":
                    catselect = 13;
                    break;
                case "MATERIAL DE LIMPEZA":
                    catselect = 14;
                    break;
                case "OUTRAS BEBIDAS":
                    catselect = 15;
                    break;
                case "PATISSERIE":
                    catselect = 16;
                    break;
                case "PETITS-FOURS":
                    catselect = 17;
                    break;
                case "PROCESSADOS":
                    catselect = 18;
                    break;
                case "SECOS":
                    catselect = 19;
                    break;
                case "UTENSILIOS":
                    catselect = 20;
                    break;
                case "VIENNOISERIE":
                    catselect = 21;
                    break;
            }
            datafab = DateTime.Parse(dtp_dtfabr.Text); //formata a data
            datavenc = DateTime.Parse(dtp_dtvenc.Text);

            if (foto != null)
            {
                foto = foto.Replace(@"\", @"\\"); //formata o caminho da foto
            }

            sql = string.Format("update produtos set nome = '{0}', cod_barras = '{1}', dt_fabr = '{2}', dt_venc = '{3}', lote = '{4}', quantidade = '{5}', preco = '{6}', foto = '{7}', categoria_cod_categoria = '{8}' where cod_prod ='{9}'"
                , txt_nome.Text, txt_codbarras.Text, datafab.ToString("yyyy-MM-dd"), datavenc.ToString("yyyy-MM-dd"), txt_lote.Text, nmr_quant.Value, txt_preco.Text, foto, catselect, txt_codigo.Text);
            bd.AlterarTabelas(sql);
            MessageBox.Show("Produto alterado com sucesso!", "Alterar produto!", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            Listar();
            Limpar();
        }

        private void btn_buscar_Click_1(object sender, EventArgs e)
        {
            {

                DataTable buscar = new DataTable(); // cria o parametro buscar

                sql = string.Format("select * from produtos where cod_prod = '{0}' or nome = '{1}'"
                    , txt_codigo.Text, txt_nome.Text); // executa o comando SELECT no bd
                buscar = bd.ConsultarTabelas(sql); // busca o resultado

                if (buscar.Rows.Count > 0) // conta a quantidade de linhas de resultado do select no bd
                {
                    txt_codigo.Text = (buscar.Rows[0]["cod_prod"].ToString()); //busca o campo no bd e coloca dentro do textbox
                    txt_codbarras.Text = (buscar.Rows[0]["cod_barras"].ToString());
                    txt_nome.Text = buscar.Rows[0]["nome"].ToString();
                    txt_lote.Text = buscar.Rows[0]["lote"].ToString();
                    txt_preco.Text = (buscar.Rows[0]["preco"].ToString());
                    nmr_quant.Value = int.Parse(buscar.Rows[0]["quantidade"].ToString());
                    dtp_dtfabr.Text = buscar.Rows[0]["dt_fabr"].ToString();
                    dtp_dtvenc.Text = buscar.Rows[0]["dt_venc"].ToString();
                    cbx_categoria.Text = buscar.Rows[0]["categoria_cod_categoria"].ToString();
                    img_prod.Load(buscar.Rows[0]["foto"].ToString());
                }
                else
                {
                    MessageBox.Show("O produto não existe no sistema!", "Produto inexistente", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
            }
        }

        private void btn_excluir_Click(object sender, EventArgs e) //exclui os itens no bd
        {
            sql = string.Format("delete from produtos where cod_prod = '{0}'", txt_codigo.Text);
            bd.AlterarTabelas(sql);
            MessageBox.Show("Cadastro do produto excluido com sucesso!!", "Excluir cadastro", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            Limpar();
            Listar();
        }

        private void btn_limpar_Click(object sender, EventArgs e) //limpa os campos digitados
        {
            Limpar();
        }

        private void btn_foto_Click(object sender, EventArgs e)
        {
            //ofdFoto.Filter = "Imagens (*.BMP;*.JPG;*.GIF,*.PNG,*.TIFF)|*.BMP;*.JPG;*.GIF;*.PNG;*.TIFF|" + "All files (*.*)|*.*";
            ofdFoto.Filter = "Imagens (*.JPG;*.PNG;*.GIF)|*.JPG;*.PNG;*.GIF|" + "Todos os arquivos (*.*)|*.*";
            foto = "";
            if (ofdFoto.ShowDialog() == System.Windows.Forms.DialogResult.OK) //abrir pasta de selecao de imagem
            {
                img_prod.Load(ofdFoto.FileName); //carrega a foto
                foto = ofdFoto.FileName;
            }
        }

        //código do frm_cadastro---------------------------------------------------------------------------

        public void Listar2() //coloca as informações no painel
        {
            sql = "select * from funcionario"; //comando pro bd
            dgv_func.DataSource = bd.ConsultarTabelas(sql); //executa o comando no bd e pega as informações
            //img_prod.Load("C:/Users/rodri/Downloads/trabalho_interdiciplinar/img/sem_produto.png");
        }

        public void Limpar2() //criacao do metodo de limpeza dos campos da interface cadastro
        {
            txt_cpf.Clear();
            txt_email.Clear();
            txt_nome2.Clear();
            txt_senha.Clear();
            txt_telefone2.Clear();
            //img_prod.Load("H:/trabalho_interdiciplinar/img/sem_produto.png"); //carregar a imagem | troque "\" por "/"
        }
        private void btn_novofunc_Click(object sender, EventArgs e)
        {
            //formata os numeros do cpf
            string convertido = txt_cpf.Text; //converte o txt_cpf para string na variável convertido
            String.Format("{0:#########-##}", convertido); //aplica a formatação do cpf (os "#" são os caracteres))
            txt_cpf.Text = convertido;
            Regex cpf = new Regex(@"\d{8}-\d{2}"); //formatção do cpf
            if (cpf.IsMatch(txt_cpf.Text))
            {

            }
            else
            {
                MessageBox.Show("Use o cpf na formatação : #########-##", "Formato incorreto", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            //formata o numero de telefone
            string convertido2 = txt_telefone2.Text; //converte o txt_cpf para string na variável convertido
            String.Format("{0:(##) ######-####}", convertido2); //aplica a formatação de telefone (os "#" são os caracteres))
            txt_telefone2.Text = convertido2;
            Regex tel = new Regex(@"\(\d{2}\)\d{5}-\d{4}"); //formatação do celular
            if (tel.IsMatch(txt_telefone2.Text))
            {

            }
            else
            {
                MessageBox.Show("Use o telefone na formatação : (##) #####-####", "Formato incorreto", MessageBoxButtons.OK, MessageBoxIcon.Error); //mensagem de erro
                return; //não deixa o código continuar executando
            }

            sql = string.Format("insert into funcionario values(null, '{0}', '{1}', '{2}', '{3}', '{4}', '{5}');"
            , txt_senha.Text, txt_email.Text, txt_nome2.Text, txt_cpf.Text, txt_telefone2.Text,
            foto); //executa o comando na ordem dos elementos criados
            bd.AlterarTabelas(sql);                                                           //no bd
            MessageBox.Show("Funcionário cadastrado com sucesso!", "Funcionario cadastrado", MessageBoxButtons.OK, MessageBoxIcon.Information);
            Limpar2();
        }

        private void btn_altfunc_Click(object sender, EventArgs e)
        {
            foto = foto.Replace(@"\", @"\\"); //formata o caminho da foto

            sql = string.Format("update funcionario set senha = '{0}', email = '{1}', nome = '{2}', cpf = '{3}', telefone = '{4}', foto = '{5}' where cod_funcionario ='{6}'"
                , txt_senha.Text, txt_email.Text, txt_nome2.Text, txt_cpf.Text, txt_telefone2.Text, foto);
            bd.AlterarTabelas(sql);
            MessageBox.Show("Cadastro do funcionário alterado com sucesso!", "Alterar cadastro!", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            Listar();
            Limpar2();
        }

        private void btn_fotofunc_Click(object sender, EventArgs e)
        {
            //ofdFoto.Filter = "Imagens (*.BMP;*.JPG;*.GIF,*.PNG,*.TIFF)|*.BMP;*.JPG;*.GIF;*.PNG;*.TIFF|" + "All files (*.*)|*.*";
            ofdFoto.Filter = "Imagens (*.JPG;*.PNG;*.GIF)|*.JPG;*.PNG;*.GIF|" + "Todos os arquivos (*.*)|*.*";
            foto = "";
            if (ofdFoto.ShowDialog() == System.Windows.Forms.DialogResult.OK) //abrir pasta de selecao de imagem
            {
                img_prod.Load(ofdFoto.FileName); //carrega a foto
                foto = ofdFoto.FileName;
            }
        }
        private void btn_buscfunc_Click(object sender, EventArgs e)
        {
            {
                DataTable buscar = new DataTable(); // cria o parametro buscar

                sql = string.Format("select * from funcionario where email = '{0}' or nome = '{1}'"
                    , txt_email.Text, txt_nome2.Text); // executa o comando SELECT no bd
                buscar = bd.ConsultarTabelas(sql); // busca o resultado

                if (buscar.Rows.Count > 0) // conta a quantidade de linhas de resultado do select no bd
                {
                    txt_senha.Text = (buscar.Rows[0]["senha"].ToString()); //busca o campo no bd e coloca dentro do textbox
                    txt_email.Text = (buscar.Rows[0]["email"].ToString());
                    txt_nome2.Text = buscar.Rows[0]["nome"].ToString();
                    txt_cpf.Text = buscar.Rows[0]["cpf"].ToString();
                    txt_telefone2.Text = (buscar.Rows[0]["telefone"].ToString());
                    img_prod.Load(buscar.Rows[0]["foto"].ToString());
                }
                else
                {
                    MessageBox.Show("O funcionario não existe no sistema!", "Funcionário inexistente!", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
            }
        }

        private void btn_revelpsw_Click(object sender, EventArgs e)
        {
            txt_senha.UseSystemPasswordChar = false;
        }

        private void btn_alterarfunc_Click(object sender, EventArgs e)
        {
            if (foto != null)
            {
                foto = foto.Replace(@"\", @"\\"); //formata o caminho da foto
            }

            sql = string.Format("update funcionario set senha = '{0}', email = '{1}', cpf = '{2}', telfone = '{3}', foto = '{4}' where nome ='{5}'"
                , txt_senha, txt_email, txt_cpf, txt_telefone2, foto, txt_nome2);
            bd.AlterarTabelas(sql);
            MessageBox.Show("Cadastro alterado com sucesso!", "Alterar cadastro!", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            Listar();
            Limpar2();
        }
        private void btn_excluirfunc_Click(object sender, EventArgs e)
        {
            sql = string.Format("delete from funcionario where nome = '{0}' or email='{1}'", txt_nome2.Text, txt_email.Text);
            bd.AlterarTabelas(sql);
            MessageBox.Show("Funcionário excluido com sucesso!!", "Funcionário excluido", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            Limpar2();
            Listar();
        }
        private void btn_limparfunc_Click(object sender, EventArgs e)
        {
            Limpar2();
        }
    }
}