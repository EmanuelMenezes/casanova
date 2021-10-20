import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListagemClientesComponent } from './listagem-clientes/listagem-clientes.component';
import { FormularioClientesComponent } from './formulario-clientes/formulario-clientes.component';
import { ClientesRoutingModule } from './clientes-routing.module';

@NgModule({
  declarations: [ListagemClientesComponent, FormularioClientesComponent],
  imports: [
    CommonModule,
    ClientesRoutingModule,
  ]
})
export class ClientesModule { }
