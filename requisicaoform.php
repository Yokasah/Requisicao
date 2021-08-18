	<div class="hero-container">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow-3">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 ">
								<h5>Requisição</h5>
								<hr>
								<div class="form-group">
									<form method="POST" action="processoRegist.php">
										<label for="destino"">Destino</label>
										<input id="destino" name="destino" class="form-control form-control-lg "
										       type="text" required>
										<label for="datetimeinicio">Data Inicial</label>
										<input id="datetimeinicio" name="datetimeinicio"
										       class="form-control form-control-lg"
										       type="datetime-local" required>
										<label for="datetimefinal">Data Final</label>
										<input id="datetimefinal" name="datetimefinal"
										       class="form-control form-control-lg"
										       type="datetime-local" required>

										<label for="veiculos">Veículos Disponiveis</label>
										<select class="form-control" name="veiculos" id="veiculos" required>
											<?php
											//Query para buscar as informações dos veiculos e associar da tabela veiculos a tabela das Marcas e Modelos
											$resultModelo = $conn->query( "SELECT * FROM veiculos");
											while ( $rowsVeiculo = $resultModelo->fetch_assoc() ) {
												//Demonstrar numa dropdown aqueles que estão disponiveis na Altura
												if ( $rowsVeiculo['estado_veiculo'] == "0" ) {
													$veiculoCompleto = $rowsVeiculo['id_veiculo'] ." - " . $rowsVeiculo['marca_veiculo'] . " " . $rowsVeiculo['modelo_veiculo'];
													echo "<br>";
													echo "<option value='   ".$rowsVeiculo['id_veiculo']."'>$veiculoCompleto</option>";
												}
											}
											?>
										</select>

										<label for="descricao">Descrição da Requisição</label>
										<textarea class="form-control" id="descricao" name="descricao"
										          required></textarea>

										<label for="lotacao">Lotação</label>
										<select multiple class="form-control" id="lotacao" name="lotacao" required>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										</select>
										<br>
										<button type="submit" name="login" class="btn btn-info btn-md" value="submit">
											Registar
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
