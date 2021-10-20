import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListagemImoveisComponent } from './listagem-imoveis/listagem-imoveis.component';
import { FormularioImoveisComponent } from './formulario-imoveis/formulario-imoveis.component';
import { ImoveisRoutingModule } from './imoveis-routing.module';

@NgModule({
  declarations: [ListagemImoveisComponent, FormularioImoveisComponent],
  imports: [
    CommonModule,
    ImoveisRoutingModule
  ]
})
export class ImoveisModule { }
